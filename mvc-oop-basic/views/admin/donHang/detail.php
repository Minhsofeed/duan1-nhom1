<?php include '../views/admin/layout/header.php'; ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <h3 class="page-title">Quản Lý Đơn Hàng - Mã Đơn Hàng: <?= $donHang['ma_don_hang'] ?></h3>
                </div>
            </div>

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Main Content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $colorAlerts = match (true) {
                                    $donHang['trang_thai_id'] == 1 => 'primary',
                                    $donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9 => 'warning',
                                    $donHang['trang_thai_id'] == 10 => 'success',
                                    default => 'primary',
                                };
                                ?>
                                <div class="alert alert-<?= $colorAlerts ?>" role="alert">
                                    Trạng Thái: <?= $donHang['ten_trang_thai'] ?>
                                </div>

                                <!-- Order Details and Customer Info Section -->
                                <div class="row">
                                    <!-- Column 1: Thông Tin Đơn Hàng -->
                                    <div class="col-md-6">
                                        <table class="table table-bordered mb-4">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th colspan="2">Thông Tin Đơn Hàng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Mã Đơn Hàng</th>
                                                    <td><?= $donHang['ma_don_hang'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Ngày Đặt</th>
                                                    <td><?= $donHang['ngay_dat'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tổng Tiền</th>
                                                    <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VND</td>
                                                </tr>
                                                <tr>
                                                    <th>Thanh Toán</th>
                                                    <td><?= $donHang['ten_phuong_thuc'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Column 2: Thông Tin Người Đặt -->
                                    <div class="col-md-6">
                                        <table class="table table-bordered mb-4">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th colspan="2">Thông Tin Người Đặt</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Họ Tên</th>
                                                    <td><?= $donHang['ho_ten'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?= $donHang['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>SĐT</th>
                                                    <td><?= $donHang['so_dien_thoai'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Products Table -->
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>STT</th>
                                                    <th>Tên Sản Phẩm</th>
                                                    <th>Ảnh</th>
                                                    <th>Đơn Giá</th>
                                                    <th>Số Lượng</th>
                                                    <th>Thành Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $tong_tien = 0; ?>
                                                <?php foreach ($sanPhamDonHang as $key => $sanPham): ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $sanPham['ten_san_pham'] ?></td>
                                                        <td><img src="./images/category<?= $sanPham['hinh_anh']; ?>" width="100"></td>
                                                        <td><?= number_format($sanPham['don_gia'], 0, ',', '.') ?> VND</td>
                                                        <td><?= $sanPham['so_luong'] ?></td>
                                                        <td><?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?> VND</td>
                                                    </tr>
                                                    <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Summary Table -->
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th colspan="2">Tổng Hợp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Thành Tiền</th>
                                                    <td><?= number_format($tong_tien, 0, ',', '.') ?> VND</td>
                                                </tr>
                                                <tr>
                                                    <th>Vận Chuyển</th>
                                                    <td>30,000 VND</td>
                                                </tr>
                                                <tr>
                                                    <th>Tổng Cộng</th>
                                                    <td class="text-danger"><strong><?= number_format($tong_tien + 30000, 0, ',', '.') ?> VND</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Shop Quần áo & Giày Đá Bóng.
                </div>
            </div>
        </div>
    </footer>
</div>
<?php include '../views/admin/layout/footer.php'; ?>