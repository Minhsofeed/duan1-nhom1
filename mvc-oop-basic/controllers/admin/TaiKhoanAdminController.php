<?php 
require_once '../models/Taikhoan.php';
 class TaiKhoanAdminController extends Taikhoan {
    public function index()
    {
      $listAdmin = $this->listTaiKhoanAdmin();
      include '../views/admin/taikhoan/taikhoanadmin/list.php'; 
    }
    public function createAddmin(){
        
        
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['them-admin'])){

        $errors = [];
        if(empty($_POST['ho_ten'])){
           $errors['ho_ten'] = 'Không được để trống trường này';
        } 
        if(empty($_POST['email'])){
          $errors['email'] = 'Không được để trống trường này';
       } 
       if(empty($_POST['so_dien_thoai'])){
          $errors['so_dien_thoai'] = 'Không được để trống trường này';
       } 
       if(empty($_POST['dia_chi'])){
          $errors['dia_chi'] = 'Không được để trống trường này';
       }
      
       if(empty($_POST['mat_khau'])){
          $errors['mat_khau'] = 'Không được để trống trường này';
       } 
       if(empty($_POST['chuc_vu_id'])){
        $errors['chuc_vu_id'] = 'Không được để trống trường này';
     } 
       if(!isset($_FILES['anh_dai_dien'])|| $_FILES['anh_dai_dien']['error'] !== UPLOAD_ERR_OK ){
          $errors['anh_dai_dien'] = 'Vui lòng chọn lại ảnh ';
       } 
       $_SESSION['errors']  = $errors;
      
      
       $file = $_FILES['anh_dai_dien'];
       $anh_dai_dien = $file['name'];

       if(move_uploaded_file($file['tmp_name'] , './images/avataradmin' . $anh_dai_dien)){
          $addAdmin =$this-> addAddmin($_POST['ho_ten'], $anh_dai_dien,$_POST['ngay_sinh' ], $_POST['email'] , $_POST['so_dien_thoai'],  $_POST['gioi_tinh'], $_POST['dia_chi'], $_POST['mat_khau'], $_POST['chuc_vu_id'], $_POST['trang_thai']);
           if($addAdmin){
              $_SESSION['success'] = 'thêm admin thành công';
              header('Location: index.php?act=san-pham');
              exit();
           }else{
             $_SESSION['errors'] = 'Thêm sản phẩm thất bại. Mời nhập lại ';
             // header('Location:'.$_SERVER['HTTP_REFERER']);
            
            
          }
       }
      }
      include '../views/admin/taikhoan/taikhoanadmin/create.php';
  }
  public function suaAdmin($id)
  {
      $getAdmin = $this->detailsAdmin($id); 
      if ($getAdmin) {
         
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-admin'])) {
             
              $this->updateAdmin($id); 
          }
          include '../views/admin/taikhoan/taikhoanadmin/edit.php';
      } else {
          $_SESSION['errors'] = 'Không tìm thấy admin với ID: ' . $id;
          header('Location: index.php?act=list-admin');
          exit();
      }
  }



  public function updateAdmin($id)
  {
       if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-admin'])){

         $errors = [];
         if(empty($_POST['ho_ten'])){
            $errors['ho_ten'] = 'Không được để trống trường này';
         } 
         if(empty($_POST['email'])){
           $errors['email'] = 'Không được để trống trường này';
        } 
        if(empty($_POST['so_dien_thoai'])){
           $errors['so_dien_thoai'] = 'Không được để trống trường này';
        } 
        if(empty($_POST['dia_chi'])){
           $errors['dia_chi'] = 'Không được để trống trường này';
        }
       
        if(empty($_POST['mat_khau'])){
           $errors['mat_khau'] = 'Không được để trống trường này';
        } 
        if(empty($_POST['chuc_vu_id'])){
         $errors['chuc_vu_id'] = 'Không được để trống trường này';
      } 
        
        $_SESSION['errors']  = $errors;
       
        $file = $_FILES['anh_dai_dien'];
        $anh_dai_dien = $file['name'];
        
 
          // Nếu không có lỗi, thực hiện cập nhật
         
              // Gọi phương thức update trong model để cập nhật dữ liệu
              $suaAdmin = $this->editAdmin( $_POST['id'], $_POST['ho_ten'], $anh_dai_dien , $_POST['ngay_sinh' ], $_POST['email'] , $_POST['so_dien_thoai'],  $_POST['gioi_tinh'], $_POST['dia_chi'], $_POST['mat_khau'], $_POST['chuc_vu_id'], $_POST['trang_thai']);
              if ($suaAdmin) {
                  $_SESSION['success'] = 'Cập nhật danh mục thành công';
                  header('Location: index.php?act=list-admin');
                  exit();
              } else {
                  $_SESSION['errors'] = 'Cập nhật danh mục thất bại';
              }
         
      }
  }
}

?>