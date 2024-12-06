<?php

class SearchController
{
    protected $sanPham;
    protected $danhMuc;

    public function __construct()
    {
        $this->sanPham = new SanPham();
        $this->danhMuc = new Danhmuc();
    }

    public function searchPro()
    {
        $danhMuc = $this->danhMuc->listDanhmuc();
        $product = $this->sanPham->listSanPham();
        $result = $this->search();
        if (!empty($result)) {
            $product = $result;
        }
        include '../views/client/home/search.php';
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $result = $this->sanPham->search($_GET['keyword']);


            $_SESSION['keyword'] = $_GET['keyword'];

            if ($result) {
                $_SESSION['success'] = 'Tìm Kiếm Thành Công' . '' . $_GET['keyword'];
            } else {
                $_SESSION['error'] = 'Tìm Kiếm Thất Bại' . '' . $_GET['keyword'];
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            return $result;
        }
    }
}
