<?php
session_start();
require_once '../controllers/admin/DanhMucAdminController.php';
require_once '../controllers/admin/SanPhamAdminController.php';
require_once '../controllers/admin/TaiKhoanAdminController.php';
require_once '../controllers/admin/DonHangAdminController.php';
require_once '../controllers/admin/AuthControllerAdmin.php';
require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/SanPhamController.php';
require_once '../controllers/client/ProfileController.php';
require_once '../controllers/client/CartController.php';
require_once '../controllers/client/SearchController.php';
$action = isset($_GET['act']) ? $_GET['act'] : '/';
$DanhmucAdmin = new DanhMucAdminController();
$SanphamAdmin = new SanPhamAdminController();
$TaikhoanAdmin = new TaiKhoanAdminController();
$DonHangAdmin = new DonHangAdminController();
$AuthAmin = new AuthControllerAdmin();
$AuthClient = new AuthController();
$SanPhamClient = new SanPhamController();
$Profile = new ProfileController();
$GioHang = new CartController();
$Search = new SearchController();
switch ($action) {
    case 'admin':
        include '../views/admin/index.php';
        break;
    case 'admin-user':
        include '../views/admin/profie/info.php';
        break;
    case "login":
        $AuthAmin->logins();
        break;
        //Đơn Hàng
    case 'don-hang':
        $DonHangAdmin->index();
        break;
    case 'chi-tiet-don-hang':
        $DonHangAdmin->detailDonHang();
        break;
    case 'edit-don-hang':
        $DonHangAdmin->getIdDonHang();
        break;
    case "update-don-hang":
        $DonHangAdmin->updateDonHang();
        //Danh Mục
    case 'danh-muc':
        $DanhmucAdmin->index();
        break;
    case 'them-danh-muc':
        $DanhmucAdmin->createDanhMuc();
        break;
    case 'edit-danh-muc':
        $id = isset($_GET['id']) ? $_GET['id'] : 0;

        if ($id) {
            $DanhmucAdmin->suaDanhMuc($id);
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
            header('Location: ?act=danh-muc');
        }
        break;
    case 'xoa-danh-muc':
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $DanhmucAdmin->deleteDanhMuc($id);
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
        }
        break;

        //////Sản Phẩm
    case 'san-pham':
        $SanphamAdmin->index();
        break;
    case 'them-san-pham':
        $SanphamAdmin->createSanPham();
        break;

    case 'detail-san-pham':
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $SanphamAdmin->detailSanPham($id);
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
            header('Location: index.php?act=san-pham');
        }
        break;

    case 'edit-san-pham':
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $SanphamAdmin->suaSanPham($id);
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
            header('Location: index.php?act=san-pham');
        }
        break;
    case 'xoa-san-pham';
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $SanphamAdmin->deleteSanPham($id);
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
        }
        break;
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id) {
            $TaikhoanAdmin->suaAdmin($id);
        } else {
            $_SESSION['errors'] = 'ID không hợp lệ';
            header('Location: index.php?act=list-admin');
        }
        break;
    case 'list-admin':
        $TaikhoanAdmin->index();
        break;

    case 'cam-admin':
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

    case 'them-admin':
        $TaikhoanAdmin->createAddmin();
        break;
        ///////Client

    case '/':
        $SanPhamClient->index();
        break;

    case 'register':
        $AuthClient->resgister();
        break;

    case 'signin':
        $AuthClient->logins();
        break;

    case 'logout':
        $AuthClient->logout();
        break;

    case 'logout-admin':
        $AuthAmin->logoutAdmin();
        break;

    case 'detail-pro':
        if (isset($_GET['san_pham_id'])) {
            $id = $_GET['san_pham_id'];
            $SanPhamClient->getDetailSanPhamClient($id);
        } else {
            echo "Sản phẩm không tồn tại.";
        }
        break;

    case 'profiles':
        $GioHang->getListHisDonHang();
        break;

    case 'update-profile':
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

    case 'payment-processing':
        $GioHang->postCheckOut();
        break;

    case 'change-password':
        $AuthClient->updatePassword();
        break;

    case 'cancel-order':
        $GioHang->cancelDonHang();
        break;

    case 'comment-processing':
        $SanPhamClient->commentProcessing();
        break;

    case 'update-trang-thai-binh-luan':
        $SanphamAdmin->updatesTrangThaiBinhLuan();
        break;

    case 'search-product':
        $Search->searchPro();
        break;

    case '404':
        include '../views/client/404/404.php';
        break;

    case 'filter-product':
        $SanPhamClient->filterProduct();
        break;

    default:
        header("Location: index.php?act=404");
        exit();
}
