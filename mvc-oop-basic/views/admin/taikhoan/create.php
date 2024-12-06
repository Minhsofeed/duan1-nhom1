<?php include '../views/admin/layout/header.php' ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Trang thêm Admin</h4>
                    </div>
                </div>
            </div>
            <form action="index.php?act=them-admin" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab" aria-selected="true">
                                            Bảng Thêm Admin
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Họ và tên</label>
                                                    <input type="text" class="form-control" name="ho_ten" placeholder="Nhập tên" required>
                                                    <?php if (isset($_SESSION['errors']['ho_ten'])): ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                    <?php if (isset($_SESSION['errors']['email'])): ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Số điện thoại</label>
                                                    <input type="number" class="form-control" name="so_dien_thoai" placeholder="Nhập số điện thoại" >
                                                    <?php if (isset($_SESSION['errors']['so_dien_thoai'])): ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Ngày Sinh</label>
                                                    <input type="date" class="form-control" name="ngay_sinh" required>
                                                    <?php if (isset($_SESSION['errors']['ngay_sinh'])): ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['ngay_sinh'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Giới tính</label>
                                                    <select class="form-select" name="gioi_tinh" required>
                                                        <option value="1">Nam</option>
                                                        <option value="2">Nữ</option>
                                                    </select>
                                                    <?php if (isset($_SESSION['errors']['gioi_tinh'])): ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['gioi_tinh'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ" required>
                                                    <?php if (isset($_SESSION['errors']['dia_chi'])): ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Mật khẩu</label>
                                                    <input type="password" class="form-control" name="mat_khau" placeholder="Mời nhập mật khẩu" required>
                                                    <?php if (isset($_SESSION['errors']['mat_khau'])): ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['mat_khau'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Ảnh đại diện</label>
                                                    <div class="input-group">
                                                        <input class="form-control" name="anh_dai_dien" type="file" id="hinh_anh" required>
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['anh_dai_dien'])): ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['mat_khau'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end mb-3">
                    <a href="index.php?act=list-admin" class="btn btn-primary w-sm">Quay lại</a>
                    <button type="submit" name="them-admin" class="btn btn-secondary w-sm">Thêm admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include '../views/admin/layout/footer.php' ?>