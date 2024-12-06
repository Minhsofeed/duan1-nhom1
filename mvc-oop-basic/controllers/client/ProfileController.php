<?php
include_once '../models/TaiKhoan.php';
class ProfileController extends Taikhoan
{
    public function updateProfie()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_POST);
            $errors = [];
            if (empty($_POST['ho_ten'])) $errors['ho_ten'] = 'Vui Lòng Không Trống Bỏ Trường Này';
            if (empty($_POST['email'])) $errors['email'] = 'Vui Lòng Không  Bỏ Trống Trường Này';
            if (empty($_POST['sdt'])) $errors['sdt'] = 'Vui Lòng Không Bỏ Trống Trường Này';
            if (!isset($_POST['gioi_tinh'])) $errors['gioi_tinh'] = 'Vui Lòng Không Bỏ Trống Trường Này';
            if (empty($_POST['dia_chi'])) $errors['dia_chi'] = 'Vui Lòng Không Bỏ Trống Trường Này';

            if (count($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $user = $this->updateUser($_POST['ho_ten'], $_POST['email'], $_POST['sdt'], $_POST['gioi_tinh'], $_POST['dia_chi']);
            if ($user) {
                unset($_SESSION['errors']);
                $_SESSION['user'] = $this->getUserByID($_SESSION['user']['id']);
                $_SESSION['success'] = 'Cập Nhật Thành Công';
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $_SESSION['error'] = 'Cập Nhật Không Thành Công';
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}
