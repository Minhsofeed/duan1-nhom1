<?php
require_once '../models/SanPham.php';
class SanPhamController extends SanPham
{

    public function index()
    {
        $danhMuc = $this->getDanhMuc();
        $filterProduct = $this->showSanPham();
        $showSanPhamClient = $this->showSanPham();
        include '../views/client/home/home.php';
    }
    public function getDetailSanPhamClient($id)
    {
        $danhMuc = $this->getDanhMuc();
        $showDetailSanPhamClient = $this->detailsSanPhan($id);
        $showDetatilBinhLuanSanPham = $this->getBinhLuanFromSanPham($id);
        if ($showDetailSanPhamClient) {
            include '../views/client/product/detail.php';
        } else {
            echo "Sản phẩm không tồn tại.";
        }
    }

    public function commentProcessing()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $san_pham_id = $_GET['san_pham_id'];

            if (!isset($_SESSION['user'])) {
                echo json_encode(['success' => false, 'message' => 'Bạn cần đăng nhập để bình luận']);
                exit;
            }

            $tai_khoan_id = $_SESSION['user']['id'];
            $comment = $_POST['comment'];

            if ($san_pham_id) {
                $result = $this->getBinhLuanFromSanPhamID($san_pham_id, $tai_khoan_id, $comment);
                if ($result) {
                    echo json_encode(['success' => true, 'message' => 'Bình luận của bạn đã được gửi thành công']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi gửi bình luận']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Không tìm thấy sản phẩm để bình luận']);
            }
            exit;
        }
        include '../views/client/product/detail.php';
    }

    public function getDetailBinhLuanFromTaiKhoan($id)
    {
        $san_pham_id = $_GET['san_pham_id'];
        $this->getBinhLuanFromSanPham($san_pham_id);
    }
    public function filterProduct()
    {
        $danhMuc = $this->getDanhMuc();
        $filterProduct = $this->showSanPham();
        include '../views/client/home/category.php';
    }
}
