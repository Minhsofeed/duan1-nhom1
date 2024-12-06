<?php include '../views/admin/layout/header.php'; ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Cập Nhật Trạng Thái Đơn Hàng </h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="order-details" role="tabpanel">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tên Người Nhận</label>
                                                <input type="text" class="form-control" placeholder="Nhập tên người nhận" value="<?= $donHang['ten_nguoi_nhan'] ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Số Điện Thoại</label>
                                                <input type="text" class="form-control" placeholder="Nhập số điện thoại" value="<?= $donHang['sdt_nguoi_nhan'] ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" placeholder="Nhập email" value="<?= $donHang['email_nguoi_nhan'] ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Địa Chỉ</label>
                                                <input type="text" class="form-control" placeholder="Nhập địa chỉ" value="<?= $donHang['dia_chi_nguoi_nhan'] ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Phương thức thanh toán</label>
                                                <input type="text" class="form-control" placeholder="Nhập Phương Thức Thanh Toán"
                                                    value="<?= $donHang['phuong_thuc_thanh_toan_id'] == 1 ? 'Ship COD' : 'Thanh Toán Online' ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Ghi Chú</label>
                                                <textarea class="form-control" placeholder="Nhập ghi chú" disabled rows="4"><?= $donHang['ghi_chu'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end order details -->
            <form method="POST" action="?act=update-don-hang">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="update-order-status" role="tabpanel">
                                        <div class="row align-items-center">
                                            <!-- Trạng Thái Đơn Hàng section -->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Trạng Thái Đơn Hàng</label>
                                                    <input type="hidden" name="id_don_hang" value="<?= $don_hang_id ?>">
                                                    <select class="form-select" name="trang_thai">
                                                        <?php foreach ($listTrangThaiDonHang as $trang_thai): ?>
                                                            <option
                                                                value="<?= $trang_thai['id'] ?>"
                                                                <?= $trang_thai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                                                                <?= ($donHang['trang_thai_id'] > $trang_thai['id'] || in_array($donHang['trang_thai_id'], [9, 10, 11])) ? 'disabled' : '' ?>>
                                                                <?= $trang_thai['ten_trang_thai'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <div class="text-end mb-3">
                            <button type="submit" name="edit-don-hang" class="btn btn-secondary w-sm">Cập Nhật</button>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </form>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<?php include '../views/admin/layout/footer.php' ?>