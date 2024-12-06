<?php
require_once '../Connect/connect.php';
   class SanPham extends connect {
    public function listSanPham(){
        $sql = 'SELECT *FROM san_phams';
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute();
        return $stmt->fetchAll();
    }
    public function addSanPham($ten_san_pham, $gia_san_pham , $gia_khuyen_mai,$hinh_anh,$so_luong , $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai){
        $sql = "INSERT INTO san_phams(ten_san_pham, gia_san_pham, gia_khuyen_mai,hinh_anh ,so_luong, ngay_nhap ,mo_ta, danh_muc_id, trang_thai) values(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt -> execute([$ten_san_pham, $gia_san_pham , $gia_khuyen_mai,$hinh_anh,$so_luong ,  $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai]);
            
    }
    public function delete($id)
  {
    $sql = 'DELETE FROM san_phams WHERE id = ?';
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([$id]);
  }
   public function editSanPham($id, $ten_san_pham, $gia_san_pham , $gia_khuyen_mai,$hinh_anh,$so_luong , $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai){
    $sql = 'UPDATE san_phams SET ten_san_pham = ?, gia_san_pham = ? , gia_khuyen_mai = ? , hinh_anh = ? , so_luong = ? , ngay_nhap = ? , mo_ta = ? , danh_muc_id =? ,trang_thai = ?  WHERE id = ?';
    $stmt = $this->connect()->prepare($sql);
    return $stmt -> execute([$ten_san_pham, $gia_san_pham , $gia_khuyen_mai,$hinh_anh,$so_luong ,  $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai , $id]);
   }
    public function detailsSanPhan($id)
   {
    $sql = 'SELECT * FROM san_phams WHERE id = ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function showSanPham()
  {
    $sql = 'SELECT *FROM san_phams';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function detailsBinhLuan($id)
   {
    $sql = 'SELECT * FROM binh_luans WHERE id = ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC); 
   }
   public function search($keyword){
     $sql = 'SELECT *FROM san_phams WHERE lower(ten_san_pham) like? lower(?)'; 
     $stmt = $this->connect()->prepare($sql);
     $stmt->execute(['%' . $keyword . '%']);
   }
   }
?>