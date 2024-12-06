<?php
require_once '../models/Auth.php';
class AuthControllerAdmin extends Auth
{
    public function logins()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ hoặc không được bỏ trống';
            }

            if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
                $errors['password'] = 'Mật khẩu không hợp lệ ';
            }

            $_SESSION['errors'] = $errors;

            if (count($errors) > 0) {
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $login = $this->login($_POST['email'], $_POST['password']);
            if ($login) {
                $_SESSION['user'] = $login;
                $_SESSION['success'] = 'Đăng Nhập Thành Công';
                header('Location:index.php?act=admin');
            } else {
                $_SESSION['error'] = 'Đăng Nhập Thất Bại';
                header('Location:' . $_SERVER['HTTP_REFERER']);
            }
            exit();
        }
        include '../views/admin/auth/login.php';
    }

    public function logoutAdmin()
    {
        if (isset($_SESSION['user'])) {
            session_unset();
            session_destroy();
        }
        header("Location: ?act=login");
        exit();
    }
}
