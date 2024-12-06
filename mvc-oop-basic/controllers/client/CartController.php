<?php
require_once '../models/Cart.php';

class CartController extends Cart
{
    // Hiển thị danh sách sản phẩm trong giỏ hàng
    public function index()
    {
        if (isset($_SESSION['user'])) {
            $mail = $this->getTaiKhoanFromEmail($_SESSION['user']['email']);

            $gioHang = $this->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangid = $this->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangid];
                $chiTietGioHang = $this->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->getDetailGioHang($gioHang['id']);
            }
        } else {
            header('Location: index.php?act=signin');
        }
        // echo json_encode($chiTietGioHang);die;
        include '../views/client/cart/cart.php';
    }

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SESSION['user'])) {
                $mail = $this->getTaiKhoanFromEmail($_SESSION['user']['email']);
                $gioHang = $this->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangid = $this->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangid];
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];


                $checkSanPham = false;
                $chiTietGioHang = $this->getDetailGioHang($gioHang['id']);
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }

                if (!$checkSanPham) {
                    $this->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }

                $chiTietGioHang = $this->getDetailGioHang($gioHang['id']);
                header('Location:?act=cart');
                exit();
            } else {
                header('Location:?act=signin');
            }
        }
    }


    public function updateCart()
    {
        $mail = $this->getTaiKhoanFromEmail($_SESSION['user']['email']);
        $gioHang = $this->getGioHangFromUser($mail['id']);
        $gioHangid = $gioHang['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($_POST['quantity'] as $san_pham_id => $so_luong) {
                if (!$this->updateSoLuong($gioHangid, $san_pham_id, $so_luong)) {
                    $_SESSION['errors'] = 'Cập nhật giỏ hàng thất bại!';
                    header('Location: index.php?act=cart');
                    exit();
                }
            }
            $_SESSION['success'] = 'Cập nhật giỏ hàng thành công!';
            header('Location: index.php?act=cart');
            exit();
        }
    }
    public function updateCartAjax()
    {

        foreach ($_POST['data_update'] as $value) {
            $this->updateSoLuong($_POST['gio_hang_id'], $value['id'], $value['so_luong']);
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function deleteCartItem()
    {
        $mail = $this->getTaiKhoanFromEmail($_SESSION['user']['email']);
        $gioHang = $this->getGioHangFromUser($mail['id']);
        $gioHangid = $gioHang['id'];

        if ($_SERVER['REQUEST_METHOD']) {
            $san_pham_id = $_GET['san_pham_id'];
            if ($this->XoaSanPhamGiohang($gioHangid, $san_pham_id)) {
                $_SESSION['success'] = 'Xóa sản phẩm khỏi giỏ hàng thành công!';
            } else {
                $_SESSION['errors'] = 'Xóa sản phẩm khỏi giỏ hàng thất bại!';
            }
            header('Location: index.php?act=cart');
            exit();
        }
    }

    public function checkOut()
    {
        if (isset($_SESSION['user'])) {
            $user = $this->getTaiKhoanFromEmail($_SESSION['user']['email']);

            $gioHang = $this->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangid = $this->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangid];
                $chiTietGioHang = $this->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->getDetailGioHang($gioHang['id']);
            }
            include '../views/client/cart/checkOut.php';
        } else {
            header('Location: index.php?act=signin');
        }
    }

    public function postCheckOut()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            // Tạo mã đơn hàng
            $ma_don_hang = 'GB-' . rand(1000, 9999);

            $user = $this->getTaiKhoanFromEmail($_SESSION['user']['email']);
            $tai_khoan_id = $user['id'];

            // Thêm đơn hàng vào cơ sở dữ liệu
            $check = $this->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );

            if ($check) {
                $donHang = $this->getDonHangByMaDonHang($ma_don_hang);
                $don_hang_id = $donHang['id'];
                $gioHang = $this->getGioHangFromUser($tai_khoan_id);
                if ($gioHang) {
                    $chiTietGioHang = $this->getDetailGioHang($gioHang['id']);
                    foreach ($chiTietGioHang as $chiTiet) {
                        $this->addDetailDonHang(
                            $don_hang_id,
                            $chiTiet['san_pham_id'],
                            $chiTiet['gia_khuyen_mai'],
                            $chiTiet['so_luong'],
                            $chiTiet['gia_khuyen_mai'] * $chiTiet['so_luong']
                        );
                    }
                    $this->deleteGioHang($gioHang['id']);
                }
                $_SESSION['success'] = 'Mua Hàng Thành Công';
                header('Location: index.php?act=/');
                exit;
            } else {
                $_SESSION['error'] = 'Thanh Toán Thất Bại';
                header('Location:' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function getListHisDonHang()
    {
        $id = $_SESSION['user']['id'];
        $listAllDonHang = $this->getListDonHangUser($id);
        include '../views/client/profile/profile.php';
    }

    public function cancelDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['don_hang_id'];
            $trang_thai_id = 10;
            $stasus = $this->destroyDonHangUser($id, $trang_thai_id);
            if ($stasus) {
                header('Location:' . $_SERVER['HTTP_REFERER']);
            } else {
                header('Location:' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}
