<?php
require_once '../Connect/connect.php';

class Cart extends connect
{
    public function getTaiKhoanFromEmail($email)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WhERE email = ? ';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getGioHangFromUser($id)
    {
        try {
            $sql = 'SELECT * FROM gio_hangs WHERE tai_khoan_id =?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function getDetailGioHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, 
                           san_phams.ten_san_pham, 
                           san_phams.hinh_anh, 
                           san_phams.gia_san_pham, 
                           san_phams.gia_khuyen_mai
                    FROM chi_tiet_gio_hangs
                    INNER JOIN san_phams 
                    ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
                    WHERE chi_tiet_gio_hangs.gio_hang_id = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

  
    public function addGioHang($id)
    {
        try {
            $sql = 'INSERT INTO gio_hangs (tai_khoan_id) VALUES (?)';
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$id]);
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = 'UPDATE chi_tiet_gio_hangs
                SET so_luong = ?
                WHERE gio_hang_id = ? AND san_pham_id = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$so_luong, $gio_hang_id, $san_pham_id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

  
    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong)VALUES (?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$gio_hang_id, $san_pham_id, $so_luong]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function xoaSanPhamGiohang($gio_hang_id, $san_pham_id)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs 
                WHERE gio_hang_id = ? 
                AND san_pham_id = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$gio_hang_id, $san_pham_id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id)
    {
        try {
            $sql = 'INSERT INTO don_hangs (ma_don_hang, tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, tong_tien, ghi_chu, phuong_thuc_thanh_toan_id, trang_thai_id) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([
                $ma_don_hang,
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ngay_dat,
                $tong_tien,
                $ghi_chu,
                $phuong_thuc_thanh_toan_id,
                $trang_thai_id
            ]);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return true;
        }
    }

    public function deleteGioHang($gio_hang_id)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$gio_hang_id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function listHisDonHang($tai_khoan_id)
    {
        try {
            $sql = 'SELECT * FROM don_hangs WHERE tai_khoan_id= ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$tai_khoan_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    

    
}
