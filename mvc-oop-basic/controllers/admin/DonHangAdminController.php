<?php
require_once '../models/DonHang.php';
class DonHangAdminController extends DonHang
{
    public function index()
    {
        $listDonHang = $this->listDonHang();
        include '../views/admin/donhang/list.php';
    }
    public function detailDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        $donHang = $this->getDetailDonHang($don_hang_id);
        $sanPhamDonHang = $this->getSanPhamDonHang($don_hang_id);
        $listTrangThaiDonHang = $this->allTrangThaiDonHàng();
        include '../views/admin/donhang/detail.php';
    }

    public function getIdDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        $listTrangThaiDonHang = $this->allTrangThaiDonHàng();
        $donHang = $this->getDetailDonHang($don_hang_id);
        include '../views/admin/donhang/edit.php';
    }

    public function updateDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-don-hang'])) {
            $don_hang_id = $_POST['id_don_hang'];
            $trang_thai_id = $_POST['trang_thai'];
            $updateTrangThai = $this->updateTrangThaiDonHang($don_hang_id, $trang_thai_id);
            if ($updateTrangThai) {
                header('Location: ?act=don-hang');
            } else {
                header('Location: ?act=edit-don-hang&id_don_hang' . $don_hang_id);
            }
        }
    }
}
