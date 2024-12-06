<?php include '../views/admin/layout/header.php';
if (empty($_SESSION['user'])) {
    header('Location:?act=login');
    exit;
} ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <hr>
            <div class="row">
                <!--end col-->
                <div class="col-xxl-12">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                        <i class="fas fa-home"></i> Thông Tin Cá Nhân
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                        <i class="far fa-user"></i> Đổi Mật Khẩu
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form action="?act=update-profile" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="fullnameInput" class="form-label">Họ Tên</label>
                                                    <input type="text" name="ho_ten" class="form-control" value="<?= $_SESSION['user']['ho_ten'] ?>">
                                                    <?php if (isset($_SESSION['errors']['ho_ten'])): ?>
                                                        <p class="text-danger small mt-1"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="emailInput" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="<?= $_SESSION['user']['email'] ?>">
                                                    <?php if (isset($_SESSION['errors']['email'])): ?>
                                                        <p class="text-danger small mt-1"><?= $_SESSION['errors']['email'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phoneInput" class="form-label">Số Điện Thoại</label>
                                                    <input type="text" name="sdt" class="form-control" value="<?= $_SESSION['user']['so_dien_thoai'] ?>">
                                                    <?php if (isset($_SESSION['errors']['sdt'])): ?>
                                                        <p class="text-danger small mt-1"><?= $_SESSION['errors']['sdt'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
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
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="addressInput" class="form-label">Địa Chỉ</label>
                                                    <input type="text" name="dia_chi" class="form-control" value="<?= $_SESSION['user']['dia_chi'] ?>">
                                                    <?php if (isset($_SESSION['errors']['dia_chi'])): ?>
                                                        <p class="text-danger small mt-1"><?= $_SESSION['errors']['dia_chi'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="changePassword" role="tabpanel">
                                    <form action="?act=change-password" method="POST">
                                        <div class="row g-2">
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="current-password" class="form-label">Mật Khẩu Cũ</label>
                                                    <input type="password" name="current-password" class="form-control" placeholder="Nhập Mật Khẩu Cũ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="new-password" class="form-label">Mật Khẩu Mới</label>
                                                    <input type="password" name="new-password" class="form-control" placeholder="Nhập Mật Khẩu Mới">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="confirm-password" class="form-label">Xác Nhận Mật Khẩu</label>
                                                    <input type="password" name="confirm-password" class="form-control" placeholder="Nhập Lại Mật Khẩu Mới">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success">Đổi Mật Khẩu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div><!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <?php include '../views/admin/layout/footer.php' ?>