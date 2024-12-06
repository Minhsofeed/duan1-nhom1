<?php
require_once '../Connect/connect.php';

class Taikhoan extends connect
{
  public function listTaiKhoanAdmin()
  {
    try {
      $sql = 'SELECT * FROM tai_khoans';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
    
      echo 'Lỗi: ' . $e->getMessage();
    }
  }
  public function addAddmin($ho_ten, $anh_dai_dien, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau)
  {
    $sql = "INSERT INTO tai_khoans(ho_ten, anh_dai_dien, ngay_sinh, email, so_dien_thoai, gioi_tinh, dia_chi, mat_khau, chuc_vu_id, trang_thai) 
              VALUES (?, ?,?, ?, ?, ?, ?, ?, 1, 1)";
    $stmt = $this->connect()->prepare($sql);

    return $stmt->execute([$ho_ten, $anh_dai_dien, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau]);
  }
   
  public function editAdmin($id, $ho_ten, $anh_dai_dien, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau)
  {
    $sql = 'UPDATE tai_khoans SET ho_ten = ?, anh_dai_dien = ? , email = ? , so_dien_thoai = ? , gioi_tinh = ? , dia_chi = ? , mat_khau =?  WHERE id = ?';
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([$ho_ten, $anh_dai_dien, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $id]);
  }

  public function detailsAdmin($id)
  {
    try {
      $sql = 'SELECT * FROM tai_khoans WHERE id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function updateQuyenAdmin($id, $trang_thai)
  {
    try {
      $sql = 'UPDATE tai_khoans SET trang_thai = ? WHERE id = ?';
      $stmt = $this->connect()->prepare($sql);
      return $stmt->execute([$trang_thai, $id]);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function listTaiKhoanKhach()
  {
    try {
      $sql = 'SELECT * FROM tai_khoans';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function updateUser($ho_ten, $email, $so_dien_thoai, $gioi_tinh, $dia_chi)
  {
    try {
      $sql = 'UPDATE tai_khoans SET ho_ten = ?, email = ?, so_dien_thoai = ?, gioi_tinh = ?, dia_chi = ? WHERE id = ?';
      $stmt = $this->connect()->prepare($sql);
      return $stmt->execute([$ho_ten, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $_SESSION['user']['id']]);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function getUserByID($id)
  {
    try {
      $sql = 'SELECT * FROM tai_khoans WHERE id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      return $stmt->fetch();
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }
}
