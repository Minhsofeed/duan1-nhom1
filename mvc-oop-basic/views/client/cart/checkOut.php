<?php
include '../views/client/layout/header.php';

if (empty($_SESSION['user'])) {
    header('Location:?act=signin');
    exit;
}
$isCartEmpty = empty($chiTietGioHang);
?>
<div class="checkout-section mt-5">
    <div class="container">
        <h2 class="section-title text-center mb-4">Thanh Toán</h2>
        <?php if (!$isCartEmpty): ?>
            <form action="?act=payment-processing" method="POST">
                <div class="row">

                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Thông Tin Thanh Toán</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="ten_nguoi_nhan" class="form-label">Tên Người Nhận</label>
                                    <input type="text" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Nhập Tên Người Nhận" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Địa Chỉ Email</label>
                                    <input type="email" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Nhập Địa Chỉ Email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="sdt" class="form-label">Số Điện Thoại</label>
                                    <input type="text" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Nhập Số Điện Thoại" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="dia_chi" class="form-label">Địa Chỉ Người Nhận</label>
                                    <input type="text"  name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Nhập Địa Chỉ Người Nhận" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="order_note" class="form-label">Ghi Chú Đơn Hàng</label>
                                    <textarea name="ghi_chu" placeholder="Nhập Ghi Chú" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Thông Tin Đơn Hàng</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản Phẩm</th>
                                                <th>Số Lượng</th>
                                                <th>Tổng Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $tongTienGioHang = 0; ?>
                                            <?php foreach ($chiTietGioHang as $sp) : ?>
                                                <tr>
                                                    <td><?= $sp['ten_san_pham'] ?></td>
                                                    <td><?= $sp['so_luong'] ?></td>
                                                    <td>
                                                        <?php
                                                        $tongTien = $sp['gia_khuyen_mai'] ? $sp['gia_khuyen_mai'] * $sp['so_luong'] : $sp['gia_san_pham'] * $sp['so_luong'];
                                                        $tongTienGioHang += $tongTien;
                                                        echo number_format($tongTien, 0, ',', '.');
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tổng Sản Phẩm</th>
                                                <td></td>
                                                <td><?= number_format($tongTienGioHang, 0, ',', '.') ?></td>
                                            </tr>
                                            <tr>
                                                <th>Phí Ship</th>
                                                <td></td>
                                                <td><strong>30.000</strong></td>
                                            </tr>
                                            <tr class="table-primary">
                                                <th>Tổng Thanh Toán</th>
                                                <td></td>
                                                <input type="hidden" name="tong_tien" value="<?= $tongTienGioHang + 30000 ?>">
                                                <td><strong><?= number_format($tongTienGioHang + 30000, 0, ',', '.') ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-options mt-4">
                                    <h5 class="mb-3">Phương Thức Thanh Toán</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="phuong_thuc_thanh_toan_id" value="1">
                                        <label class="form-check-label" for="payment_paypal">Thanh toán khi nhận hàng </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="phuong_thuc_thanh_toan_id" disabled value="2">
                                        <label class="form-check-label" for="payment_cod">Thanh toán Online </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-4">Xác Nhận Thanh Toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <p class="text-center">Giỏ hàng của bạn hiện tại không có sản phẩm nào.</p>
        <?php endif; ?>
    </div>
</div>

<?php include '../views/client/layout/footer.php'; ?>