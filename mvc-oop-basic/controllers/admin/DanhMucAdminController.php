<?php
require_once '../models/Danhmuc.php';

class DanhMucAdminController extends Danhmuc
{
    public function index()
    {
        $listDanhMuc = $this->listDanhmuc();
        include '../views/admin/danhmuc/list.php';
    }

    public function createDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['them-danh-muc'])) {
            $errors = [];
            if (empty($_POST['ten_danh_muc'])) {
                $errors['ten_danh_muc'] = 'Không được để trống trường này';
            }

            if (empty($errors)) {
                $addDanhMuc = $this->addDanhMuc($_POST['ten_danh_muc'], $_POST['mo_ta']);
                if ($addDanhMuc) {
                    $_SESSION['success'] = 'Thêm danh mục thành công';
                    header('Location: index.php?act=danh-muc');
                    exit();
                } else {
                    $_SESSION['errors'] = 'Thêm danh mục thất bại';
                }
            } else {
                $_SESSION['errors'] = $errors;
            }
        }
        include '../views/admin/danhmuc/create.php';
    }

    public function deleteDanhMuc($id)
    {
        try {
            $this->delete($id);
            $_SESSION['success'] = 'Xóa danh mục thành công';
        } catch (\Throwable $th) {
            $_SESSION['errors'] = 'Xóa danh mục thất bại';
        }
        header('Location: index.php?act=danh-muc');
        exit();
    }

    public function suaDanhMuc($id)
    {
        $getDanhMuc = $this->detailDanhMuc($id);

        if ($getDanhMuc) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->updateDanhMuc($id);
            }

            include '../views/admin/danhmuc/edit.php';
        } else {
            $_SESSION['errors'] = 'Không tìm thấy danh mục với ID: ' . $id;
            header('Location: index.php?act=danh-muc');
            exit();
        }
    }

    public function updateDanhMuc($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            // Validate form input
            if (empty($_POST['ten_danh_muc'])) {
                $errors['ten_danh_muc'] = 'Không được để trống trường này';
            }
            if (empty($_POST['mo_ta'])) {
                $errors['mo_ta'] = 'Không được để trống trường này';
            }

            if (empty($errors)) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $mo_ta = $_POST['mo_ta'];

                $suaDanhMuc = $this->editDanhMuc($id, $ten_danh_muc, $mo_ta);
                if ($suaDanhMuc) {
                    $_SESSION['success'] = 'Cập nhật danh mục thành công';
                    header('Location: index.php?act=danh-muc');
                    exit();
                } else {
                    $_SESSION['errors'] = 'Cập nhật danh mục thất bại';
                }
            } else {
                $_SESSION['errors'] = $errors;
            }
        }
    }
}
