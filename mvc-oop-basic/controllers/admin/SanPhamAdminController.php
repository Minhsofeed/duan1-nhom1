<?php
require_once '../models/SanPham.php';
class SanPhamAdminController extends SanPham
{
   public function index()
   {
      $listSanPham = $this->listSanPham();
      include '../views/admin/sanpham/list.php';
   }
   public function createSanPham()
   {
      $listDanhMuc = $this->getDanhMuc();

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['them-san-pham'])) {

         $errors = [];
         if (empty($_POST['ten_san_pham'])) {
            $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống.';
         }
         if (empty($_POST['gia_san_pham'])) {
            $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống.';
         }
         if (empty($_POST['so_luong'])) {
            $errors['so_luong'] = 'Số lượng không được để trống.';
         }
         if (empty($_POST['danh_muc_id'])) {
            $errors['danh_muc_id'] = 'Vui lòng chọn danh mục.';
         }
         if (!isset($_FILES['hinh_anh']) || $_FILES['hinh_anh']['error'] !== UPLOAD_ERR_OK) {
            $errors['hinh_anh'] = 'Vui lòng chọn ảnh hợp lệ.';
         }
         $_SESSION['errors'] = $errors;
         if (empty($errors)) {
            $file = $_FILES['hinh_anh'];
            $hinh_anh = $file['name'];
            if (move_uploaded_file($file['tmp_name'], './images/category/' . $hinh_anh)) {
               $addSanPham = $this->addSanPham(
                  $_POST['ten_san_pham'],
                  $_POST['gia_san_pham'],
                  $_POST['gia_khuyen_mai'],
                  $hinh_anh,
                  $_POST['so_luong'],
                  $_POST['mo_ta'],
                  $_POST['danh_muc_id'],
               );
               if ($addSanPham) {
                  $_SESSION['success'] = 'Thêm sản phẩm thành công.';
                  header('Location: index.php?act=san-pham');
                  exit();
               } else {
                  $_SESSION['errors']['database'] = 'Thêm sản phẩm thất bại. Vui lòng thử lại.';
               }
            } else {
               $_SESSION['errors']['hinh_anh'] = 'Lỗi tải ảnh lên. Vui lòng thử lại.';
            }
         }
      }
      include '../views/admin/sanpham/create.php';
   }


   public function deleteSanPham($id)
   {
      try {
         $this->delete($id);
         $_SESSION['success'] = 'Xóa sản phẩm thành công';
      } catch (\Throwable $th) {
         $_SESSION['errors'] = 'Xóa sản phẩm thất bại';
      }
      header('Location: index.php?act=san-pham');
      exit();
   }

   public function suaSanPham($id)
   {
      $getSanPham = $this->detailsSanPhan($id);
      if ($getSanPham) {

         $listDanhMuc = $this->getDanhMuc();

         if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-san-pham'])) {
            $this->updateSanPham($id);
         }
         include '../views/admin/sanpham/edit.php';
      } else {
         $_SESSION['errors'] = 'Không tìm thấy danh mục với ID: ' . $id;
         header('Location: index.php?act=san-pham');
         exit();
      }
   }

   public function updateSanPham($id)
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-san-pham'])) {

         $errors = [];
         if (empty($_POST['ten_san_pham'])) {
            $errors['ten_san_pham'] = 'Không được để trống trường này';
         }
         if (empty($_POST['gia_san_pham'])) {
            $errors['gia_san_pham'] = 'Không được để trống trường này';
         }
         if (empty($_POST['so_luong'])) {
            $errors['so_luong'] = 'Không được để trống trường này';
         }


         if (empty($_POST['trang_thai'])) {
            $errors['trang_thai'] = 'Không được để trống trường này';
         }

         $_SESSION['errors']  = $errors;
         $file = $_FILES['hinh_anh'];
         $hinh_anh = $file['name'];
         if ($file['size'] > 0) {
            move_uploaded_file($file['tmp_name'], './images/category/' . $hinh_anh);

            if (!empty($_POST['old_hinh_anh']) && file_exists('./images/category/' . $_POST['old_hinh_anh'])) {
               unlink('./images/category/' . $_POST['old_hinh_anh']);
            }
         } else {
            $hinh_anh = $_POST['old_hinh_anh'];
         }

         $suaSanPham = $this->editSanPham($id, $_POST['ten_san_pham'], $_POST['gia_san_pham'], $_POST['gia_khuyen_mai'], $hinh_anh, $_POST['so_luong'], $_POST['mo_ta'], $_POST['danh_muc_id'], $_POST['trang_thai']);
         if ($suaSanPham) {
            $_SESSION['success'] = 'sửa sản phẩm thành công';
            header('Location: index.php?act=san-pham');
            exit();
         } else {
            $_SESSION['errors'] = 'Thêm sản phẩm thất bại. Mời nhập lại ';
         }
      }
   }

   public function detailSanPham()
   {
      $id = $_GET['id'];
      $sanPham = $this->detailsSanPhan($id);
      $listBinhLuan = $this->getBinhLuanFromSanPham($id);
      if ($sanPham) {
         include '../views/admin/sanpham/detail.php';
      } else {
         header("Location: ?act=san-pham");
         exit();
      }
   }

   public function updatesTrangThaiBinhLuan()
   {
      $id_binh_luan = $_POST['id_binh_luan'];
      $name_view = $_POST['name_view'];
      $id_khach_hang = $_POST['id_khach_hang'];

      $binhLuan = $this->getDetailBinhLuan($id_binh_luan);

      if ($binhLuan) {
         $trang_thai_update = '';
         if ($binhLuan['trang_thai'] == 1) {
            $trang_thai_update = 2;
         } else {
            $trang_thai_update = 1;
         }
         $status = $this->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);
         if ($status) {
            header('Location:' . $_SERVER['HTTP_REFERER']);
            $_SESSION['success'] = 'Thay Đổi Trạng Thái Thành Công';
         } else {
            $_SESSION['error'] = 'Thay Đổi Trạng Thái Thất Bại';
         }
      }
   }
}
