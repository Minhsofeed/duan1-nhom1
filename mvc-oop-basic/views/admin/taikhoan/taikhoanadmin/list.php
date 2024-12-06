<?php include '../views/admin/layout/header.php' ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh sách quản trị</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <!-- end col -->
                    <div class="col-xl-12 col-lg-8">
                        <div>
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="row g-4">
                                        <div class="col-sm-auto">
                                            <div>
                                                <a href="index.php?act=them-admin" class="btn btn-secondary" id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Thêm quản trị viên </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div id="selection-element">
                                                <div class="my-n1 d-flex align-items-center text-muted">
                                                    Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card header -->
                                <div class="card-body">

                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                            <div id="table-product-list-all" class="table-card gridjs-border-none">
                                                <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                                                    <div class="gridjs-wrapper" style="height: auto;">

                                                        <tbody class="gridjs-tbody">


                                                            <table class="table table-hover table-striped align-middle table-nowrap mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">STT</th>
                                                                        <th scope="col">Họ và tên </th>
                                                                        <th scope="col">Ảnh Đại Diện </th>
                                                                        <th scope="col">Số Điện thoại</th>
                                                                        <th scope="col">Giới tính</th>
                                                                        <th scope="col">Địa chỉ</th>
                                                                        <th scope="col">Chức vụ</th>
                                                                        <th scope="col">Trạng thái</th>
                                                                        <th scope="col">Thao tác</th>


                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                <tbody>
                                                                    <?php foreach ($listAdmin as $key => $ad): ?>
                                                                        <tr>
                                                                            <td><?= $key+1 ?></td>
                                                                            <td><?= $ad['ho_ten']; ?></td>
                                                                            <td><img src="./images/avataradmin/<?= $ad['anh_dai_dien']; ?>"width="100"></td>
                                                                            <td><?= $ad['so_dien_thoai']; ?></td>
                                                                            <td><?= $ad['gioi_tinh'] == 0 ? 'Nữ' : 'Nam'; ?></td>
                                                                            <td><?= $ad['dia_chi']; ?></td>
                                                                            <td><?= $ad['chuc_vu_id'] == 1 ? 'Admin' : 'Khách Hàng'; ?></td>
                                                                            <td><?= $ad['trang_thai'] == 1 ? 'Đang hoạt động' : 'Bị cấm'; ?></td>
                                                                            <td>
                                                                                <div class="form-check form-switch">
                                                                                    <!-- Nút sửa -->
                                                                                   


                                                                                    <form action="index.php?act=cam-admin" method="post" style="display:inline;">
                                                                                        <input type="hidden" name="id" value="<?= $ad['id']; ?>">
                                                                                        <input type="hidden" name="trang_thai" value="<?= $ad['trang_thai'] == 1 ? 2 : 1; ?>">
                                                                                        <button type="submit" name="cam-admin" class="btn <?= $ad['trang_thai'] == 1 ?  'btn-success' : 'btn-danger' ; ?>">
                                                                                            <?= $ad['trang_thai'] == 1 ?   ' <i class="ri-lock-unlock-line"></i>' : '<i class="ri-forbid-2-line"></i>'; ?>
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>


                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->

                                    </div>
                                    <!-- end card body -->

                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
    <?php include '../views/admin/layout/footer.php' ?>