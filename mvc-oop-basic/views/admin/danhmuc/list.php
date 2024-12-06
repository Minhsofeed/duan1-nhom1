<?php include '../views/admin/layout/header.php'; ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Trang Danh Mục</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <a href="index.php?act=them-danh-muc" class="btn btn-secondary"><i class="ri-add-line align-bottom me-1"></i> Thêm Danh Mục</a>
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
                                                    <table role="grid" class="gridjs-table" style="height: auto;">
                                                        <tbody class="gridjs-tbody">
                                                            <table class="table table-hover table-striped align-middle table-nowrap mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">STT</th>
                                                                        <th scope="col">Tên Danh Mục</th>
                                                                        <th scope="col">Mô Tả</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($listDanhMuc as $key => $dm): ?>
                                                                        <tr>
                                                                            <td><?= $key + 1 ?></td>
                                                                            <td><?= $dm['ten_danh_muc'] ?></td>
                                                                            <td><?= $dm['mo_ta'] ?></td>
                                                                            <td>
                                                                                <div class="form-check form-switch">
                                                                                    <a href="index.php?act=edit-danh-muc&id=<?= $dm['id'] ?>" class="btn btn-primary"><i class="ri-settings-fill"></i></a>
                                                                                    <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="index.php?act=xoa-danh-muc&id=<?= $dm['id'] ?>" class="btn btn-danger"><i class="ri-delete-bin-line"></i></a>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                    <?php endforeach ?>
                                                                </tbody>
                                                            </table>
                                                        </tbody>
                                                    </table>
                                                </div>
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