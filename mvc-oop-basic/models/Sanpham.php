<?php
require_once '../Connect/connect.php';

class SanPham extends connect
{
  public function listSanPham()
  {
    try {
      $sql = 'SELECT * FROM san_phams';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function getDanhMuc()
  {
    try {
      $sql = "SELECT * FROM danh_mucs";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function addSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $mo_ta, $danh_muc_id)
  {
    try {
      $sql = "INSERT INTO san_phams(ten_san_pham, gia_san_pham, gia_khuyen_mai, hinh_anh, so_luong, ngay_nhap, mo_ta, danh_muc_id, trang_thai) 
                VALUES(?,?,?,?,?,NOW(),?,?,'1')";
      $stmt = $this->connect()->prepare($sql);
      return $stmt->execute([$ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $mo_ta, $danh_muc_id]);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function delete($id)
  {
    try {
      $sql = 'DELETE FROM san_phams WHERE id = ?';
      $stmt = $this->connect()->prepare($sql);
      return $stmt->execute([$id]);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function editSanPham($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $mo_ta, $danh_muc_id, $trang_thai)
  {
    try {
      $sql = 'UPDATE san_phams SET ten_san_pham = ?, gia_san_pham = ?, gia_khuyen_mai = ?, hinh_anh = ?, so_luong = ?, ngay_nhap = NOW(), mo_ta = ?, danh_muc_id = ?, trang_thai = ? WHERE id = ?';
      $stmt = $this->connect()->prepare($sql);
      return $stmt->execute([$ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $mo_ta, $danh_muc_id, $trang_thai, $id]);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }


  public function detailsSanPhan($id)
  {
    try {
      $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.id  = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function showSanPham()
  {
    try {
      $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON danh_mucs.id = san_phams.danh_muc_id';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function getBinhLuanFromSanPhamID($san_pham_id, $tai_khoan_id, $noi_dung)
  {
    try {
      $sql = "INSERT INTO binh_luans(san_pham_id, tai_khoan_id, noi_dung, ngay_dang, trang_thai) 
                  VALUES (?, ?, ?, now(), 1)";
      $stmt = $this->connect()->prepare($sql);
      return $stmt->execute([$san_pham_id, $tai_khoan_id, $noi_dung]);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }
  public function getAllBinhLuanSanPham($tai_khoan_id)
  {
    try {
      $sql = 'SELECT * FROM binh_luans WHERE tai_khoan_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$tai_khoan_id]);
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }
  public function getBinhLuanFromSanPham($id)
  {
    try {
      $sql = "SELECT binh_luans.*, tai_khoans.ho_ten
        FROM binh_luans 
        INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id 
        WHERE binh_luans.san_pham_id=?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function updateTrangThaiBinhLuan($id, $trang_thai)
  {
    try {
      $sql = "UPDATE binh_luans SET trang_thai = ? WHERE id = ?";

      $stmt = $this->connect()->prepare($sql);

      $stmt->execute([$trang_thai, $id]);

      return true;
    } catch (Exception $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }
  public function getDetailBinhLuan($id)
  {
    try {
      $sql = "SELECT*FROM binh_luans WHERE id  = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      return $stmt->fetch();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage(PDO::FETCH_ASSOC);
    }
  }

  public function search($keyword)
  {
    try {
      $sql = 'SELECT san_phams .*,danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON danh_mucs.id=san_phams.danh_muc_id WHERE ten_san_pham like ? ';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute(['%' . $keyword . '%']);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
}
