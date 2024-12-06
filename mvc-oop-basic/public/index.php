<?php
session_start();
require_once '../controllers/admin/DanhMucAdminController.php';
require_once '../controllers/admin/SanPhamAdminController.php';
require_once '../controllers/admin/TaiKhoanAdminController.php';
require_once '../controllers/admin/DonHangAdminController.php';
require_once '../controllers/client/AuthController.php';
require_once '../controllers/admin/ProfileController.php';
require_once '../controllers/client/SanPhamController.php';
require_once '../controllers/client/CartController.php';
require_once '../controllers/admin/AuthControllerAdmin.php';
$action = isset($_GET['act']) ? $_GET['act'] : 'trang-chu';
$DanhmucAdmin = new DanhMucAdminController();
$SanphamAdmin = new SanPhamAdminController();
$TaikhoanAdmin = new TaiKhoanAdminController();
$DonHangAdmin = new DonHangAdminController();
$AuthClient = new AuthController();
$Profile = new ProfileController();
$SanPhamClient = new SanPhamController();
$GioHang = new CartController();
$AuthAmin = new AuthControllerAdmin();
switch ($action) {
    case 'admin':
        $DonHangAdmin->thongKe();
        $AuthAmin->middleware();
        break;
    case "login":
        $AuthAmin->logins();
        break;

    case 'admin-user':
        $AuthAmin->middleware();
        include '../views/admin/profie/info.php';
        break;

    case 'logout-admin':
        $AuthAmin->logoutAdmin();
        break;

    case 'san-pham':
        $AuthAmin->middleware();
        $SanphamAdmin->index();
        break;
    case 'them-san-pham':
        $AuthAmin->middleware();
        $SanphamAdmin->createSanPham();
        break;
    case 'edit-san-pham':
        $AuthAmin->middleware();
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $SanphamAdmin->suaSanPham($id); // Gọi phương thức sửa danh mục
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
            header('Location: index.php?act=san-pham');
        }
        break;
    case 'xoa-san-pham';
        $AuthAmin->middleware();
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $SanphamAdmin->deleteSanPham($id);
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
        }
        break;
    case 'danh-muc':
        $AuthAmin->middleware();
        $DanhmucAdmin->index();
        break;

    case 'xoa-danh-muc':
        $AuthAmin->middleware();
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $DanhmucAdmin->deleteDanhMuc($id);
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
        }
        break;

    case 'them-danh-muc':
        $AuthAmin->middleware();
        $DanhmucAdmin->createDanhMuc();
        break;
    case 'edit-danh-muc':
        $AuthAmin->middleware();
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $DanhmucAdmin->suaDanhMuc($id); // Gọi phương thức sửa danh mục
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
            header('Location: index.php?act=danh-muc');
        }
        break;
    case 'list-admin':
        $AuthAmin->middleware();
        $TaikhoanAdmin->danhSachAdmin();
        break;
    case 'list-khach-hang':
        $AuthAmin->middleware();
        $TaikhoanAdmin->danhSachKhachHang();
        break;

    case 'them-admin':
        $AuthAmin->middleware();
        $TaikhoanAdmin->createAddmin();
        break;
    case 'edit-admin':
        $AuthAmin->middleware();
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $TaikhoanAdmin->suaAdmin($id);
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
            header('Location: index.php?act=list-admin');
        }
        break;

    case 'cam-admin':
        $AuthAmin->middleware();
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $trang_thai = isset($_POST['trang_thai']) ? (int)$_POST['trang_thai'] : null;

        if ($id && in_array($trang_thai, [1, 2])) {
            $TaikhoanAdmin->quyenAdmin($id, $trang_thai);
            $_SESSION['success'] = 'Cập nhật trạng thái thành công!';
        } else {
            $_SESSION['errors'] = 'ID hoặc trạng thái không hợp lệ';
        }
        header('Location: index.php?act=list-admin');
        exit();
        break;

    case 'don-hang':
        $AuthAmin->middleware();
        $DonHangAdmin->index();
        break;
    case 'chi-tiet-don-hang':

        $DonHangAdmin->detailDonHang();
        break;
    case 'edit-don-hang':
        $AuthAmin->middleware();
        $DonHangAdmin->getIdDonHang();
        break;
    case "update-don-hang":
        $AuthAmin->middleware();
        $DonHangAdmin->updateDonHang();
    case 'trang-chu':
        $SanPhamClient->showSanPhamClient();
        break;

    case 'dang-ky':
        $AuthClient->resgister();
        break;

    case 'dang-nhap':
        $AuthClient->logins();
        break;

    case 'update-profile':
        $Profile->updateProfie();
        break;
    case 'dang-xuat':
        $AuthClient->logout();
    case 'chi-tiet-san-pham':
        if (isset($_GET['san_pham_id'])) {
            $id = $_GET['san_pham_id'];
            $SanPhamClient->getDetailSanPhamClient($id);
        } else {
            echo "Sản phẩm không tồn tại.";
        }
        break;
        include '../views/client/product/detail.php';
        break;

    case 'tai-khoan-ca-nhan':
        include '../views/client/profile/profile.php';
        break;
    case 'profile':
        include '../views/admin/profie/info.php';
        break;
    case 'update-ca-nhan':
        $Profile->updateProfie();
        break;
    case 'cart':
        $GioHang->index();
        break;
    case 'update-cart-ajax':
        $GioHang->updateCartAjax();
        break;
    case 'addToCart':
        $GioHang->addToCart();
        break;

    case 'delete-cart':
        $GioHang->deleteCartItem();
        break;

    case 'update-cart':
        $GioHang->updateCart();
        break;

    case 'check-out':
        $GioHang->checkOut();
        break;

    case 'change-password':
        $AuthClient->updatePassword();
        break;

    case 'check-out':
        $GioHang->checkOut();
        break;

    case 'comment-processing':
        $SanPhamClient->commentProcessing();
        break;

    case 'binh-luan':
        $TaikhoanAdmin->danhSachBinhLuan($id);
        break;
        
}
