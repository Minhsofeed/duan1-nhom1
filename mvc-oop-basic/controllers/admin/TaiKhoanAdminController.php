<?php
require_once '../models/Taikhoan.php';
class TaiKhoanAdminController extends Taikhoan
{
   public function index()
   {
      $listAdmin = $this->listTaiKhoanAdmin();
      include '../views/admin/taikhoan/list.php';
   }

   public function createAddmin()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['them-admin'])) {
         $errors = [];
         if (empty($_POST['ho_ten'])) {
            $errors['ho_ten'] = 'Không được để trống trường này';
         }
         if (empty($_POST['email'])) {
            $errors['email'] = 'Không được để trống trường này';
         }
         if (empty($_POST['so_dien_thoai'])) {
            $errors['so_dien_thoai'] = 'Không được để trống trường này';
         }
         if (empty($_POST['dia_chi'])) {
            $errors['dia_chi'] = 'Không được để trống trường này';
         }
         if (empty($_POST['mat_khau'])) {
            $errors['mat_khau'] = 'Không được để trống trường này';
         } elseif (strlen($_POST['mat_khau']) < 6) {
            $errors['mat_khau'] = 'Mật khẩu phải có ít nhất 6 ký tự';
         }

         if (empty($_POST['ngay_sinh'])) {
            $errors['ngay_sinh'] = 'Không được để trống trường này';
         } else {
            $ngay_sinh = new DateTime($_POST['ngay_sinh']);
            $today = new DateTime();
            $age = $today->diff($ngay_sinh)->y;
            if ($age < 18) {
               $errors['ngay_sinh'] = 'Bạn phải ít nhất 18 tuổi để thêm admin';
            }
         }

         if (!isset($_FILES['anh_dai_dien']) || $_FILES['anh_dai_dien']['error'] !== UPLOAD_ERR_OK) {
            $errors['anh_dai_dien'] = 'Vui lòng chọn lại ảnh';
         }
         $_SESSION['errors']  = $errors;

         if (!empty($errors)) {
            include '../views/admin/taikhoan/create.php';
            return;
         }

         $file = $_FILES['anh_dai_dien'];
         $anh_dai_dien = $file['name'];
         $hashed_password = password_hash($_POST['mat_khau'], PASSWORD_DEFAULT);

         if (move_uploaded_file($file['tmp_name'], './images/avatar/' . $anh_dai_dien)) {
            $addAdmin = $this->addAddmin(
               $_POST['ho_ten'],
               $anh_dai_dien,
               $_POST['ngay_sinh'],
               $_POST['email'],
               $_POST['so_dien_thoai'],
               $_POST['gioi_tinh'],
               $_POST['dia_chi'],
               $hashed_password,
               $_POST['chuc_vu_id'],
               $_POST['trang_thai']
            );
            if ($addAdmin) {
               $_SESSION['success'] = 'Thêm admin thành công';
               header('Location: index.php?act=list-admin');
               exit();
            } else {
               $_SESSION['errors'] = 'Thêm admin thất bại. Mời nhập lại.';
            }
         }
      }
      include '../views/admin/taikhoan/create.php';
   }
   
   public function  quyenAdmin($id, $trang_thai)
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cam-admin'])) {

         $id = $_POST['id'];
         $trang_thai = $_POST['trang_thai'];
         if ($id && $trang_thai !== null) {
            // var_dump($this);die;
            $camAdmin = $this->updateQuyenAdmin($id, $trang_thai);

            if ($camAdmin) {
               $_SESSION['success'] = 'Cập nhật trạng thái thành công!';
            } else {
               $_SESSION['errors'] = 'Cập nhật trạng thái thất bại!';
            }


            header('Location: index.php?act=list-admin');
            exit();
         } else {
            $_SESSION['errors'] = 'Dữ liệu không hợp lệ!';
            header('Location: index.php?act=list-admin');
            exit();
         }
      }
   }
}
