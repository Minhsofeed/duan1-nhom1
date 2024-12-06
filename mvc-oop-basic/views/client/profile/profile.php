<?php include '../views/client/layout/header.php' ?>
<section class="main_content_area py-5">
    <div class="container">
        <div class="account_dashboard bg-light p-4 rounded shadow-sm">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="dashboard_tab_button bg-white p-3 rounded shadow-sm">
                        <h5 class="text-center mb-3">Thông Tin Cá Nhân</h5>
                        <ul class="nav flex-column dashboard-list" id="nav-tab">
                            <li class="nav-item">
                                <a href="#orders" data-bs-toggle="tab" class="nav-link active">Đon Hàng</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-details" data-bs-toggle="tab" class="nav-link">Chi Tiết Tài Khoản</a>
                            </li>
                            <li class="nav-item">
                                <a href="#change-password" data-bs-toggle="tab" class="nav-link">Thay Đổi Mật Khẩu</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        <!-- Orders Tab -->
                        <div class="tab-pane fade show active" id="orders">
                            <h3 class="mb-4">Đơn hàng của Tôi</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>STT</th>
                                            <th>Đơn Hàng</th>
                                            <th>Tên Người Nhận</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Số Lượng</th>
                                            <th>Ngày Đặt</th>
                                            <th>Trạng Thái</th>
                                            <th>Tổng Tiền</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($listAllDonHang)) : ?>
                                            <?php foreach ($listAllDonHang as $key => $donHang) : ?>

                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $donHang['ma_don_hang'] ?></td>
                                                    <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                                    <td><?= $donHang['ten_san_pham'] ?></td>
                                                    <td><?= $donHang['so_luong'] ?></td>
                                                    <td><?= (new DateTime($donHang['ngay_dat']))->format('d/m/Y') ?></td>
                                                    <td><?= $donHang['ten_trang_thai'] ?></td>
                                                    <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?>₫</td>
                                                    <td>
                                                        <?php if ($donHang['trang_thai_id'] != 10): ?>
                                                            <form action="?act=cancel-order" method="POST">
                                                                <input type="hidden" name="don_hang_id" value="<?= $donHang['id'] ?>">
                                                                <button type="submit" class="btn btn-danger btn-sm">Hủy Đơn</button>
                                                            </form>
                                                        <?php else: ?>
                                                            <button class="btn btn-secondary btn-sm" disabled>Hủy Đơn</button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Không có đơn hàng nào.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- Account Details Tab -->
                        <div class="tab-pane fade" id="account-details">
                            <h3 class="mb-4">Chi Tiết Tài Khoản</h3>
                            <form action="index.php?act=update-profile" method="POST">
                                <div class="mb-3">
                                    <label for="ho_ten" class="form-label">Họ Tên</label>
                                    <input type="text" name="ho_ten" class="form-control" value="<?= $_SESSION['user']['ho_ten'] ?>">
                                    <?php if (isset($_SESSION['errors']['ho_ten'])): ?>
                                        <p class="text-danger small mt-1"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $_SESSION['user']['email'] ?>">
                                    <?php if (isset($_SESSION['errors']['email'])): ?>
                                        <p class="text-danger small mt-1"><?= $_SESSION['errors']['email'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="sdt" class="form-label">Số Điện Thọai</label>
                                    <input type="text" name="sdt" class="form-control" value="<?= $_SESSION['user']['so_dien_thoai'] ?>">
                                    <?php if (isset($_SESSION['errors']['sdt'])): ?>
                                        <p class="text-danger small mt-1"><?= $_SESSION['errors']['sdt'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="gioi_tinh" class="form-label">Giới Tính</label>
                                    <select id="gioi-tinh" name="gioi_tinh" class="form-select">
                                        <option value="0" <?= $_SESSION['user']['gioi_tinh'] == 0 ? 'selected' : '' ?>>Nam</option>
                                        <option value="1" <?= $_SESSION['user']['gioi_tinh'] == 1 ? 'selected' : '' ?>>Nữ</option>
                                    </select>
                                    <?php if (isset($_SESSION['errors']['gioi_tinh'])): ?>
                                        <p class="text-danger small mt-1"><?= $_SESSION['errors']['gioi_tinh'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="dia_chi" class="form-label">Địa Chỉ</label>
                                    <input type="text" name="dia_chi" class="form-control" value="<?= $_SESSION['user']['dia_chi'] ?>">
                                    <?php if (isset($_SESSION['errors']['dia_chi'])): ?>
                                        <p class="text-danger small mt-1"><?= $_SESSION['errors']['dia_chi'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <button type="submit" name="update-profile" class="btn btn-primary">Cập Nhật</button>
                            </form>
                        </div>

                        <!-- Change Password Tab -->
                        <div class="tab-pane fade" id="change-password">
                            <h3 class="mb-4">Đổi Mật Khẩu</h3>
                            <form action="index.php?act=change-password" method="post">
                                <div class="mb-3">
                                    <label for="current-password" class="form-label">Mật Khẩu Cũ</label>
                                    <input type="password" name="current-password" class="form-control" placeholder="Nhập Mật Khẩu Cũ">
                                </div>
                                <div class="mb-3">
                                    <label for="new-password" class="form-label">Mật Khẩu Mới</label>
                                    <input type="password" name="new-password" class="form-control" placeholder="Nhập Mật Khẩu Mới">
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Xác Nhận Mật Khẩu</label>
                                    <input type="password" name="confirm-password" class="form-control" placeholder="Nhập Lại Mật Khẩu Mới">
                                </div>
                                <button type="submit" class="btn btn-primary">Cập Nhật Mật Khẩu</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
unset($_SESSION['errors']);
include '../views/client/layout/footer.php'; ?>