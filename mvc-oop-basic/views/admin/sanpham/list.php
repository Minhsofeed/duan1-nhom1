<?php include '../views/admin/layout/header.php' ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh sách sản phẩm</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <div class="col-xl-12 col-lg-8">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <a href="index.php?act=them-san-pham" class="btn btn-secondary" id="addproduct-btn">
                                            <i class="ri-add-line align-bottom me-1"></i> Thêm sản phẩm
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                        <div id="table-product-list-all" class="table-responsive">
                                            <table class="table table-hover table-striped align-middle table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">Tên sản phẩm</th>
                                                        <th scope="col">Giá sản phẩm</th>
                                                        <th scope="col">Hình ảnh</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Ngày nhập</th>
                                                        <th scope="col">Danh mục</th>
                                                        <th scope="col">Trạng thái</th>
                                                        <th scope="col">Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($listSanPham as $key => $sp) : ?>
                                                        <tr>
                                                            <td><?= $key + 1 ?></td>
                                                            <td><?= $sp['ten_san_pham']; ?></td>
                                                            <td><?= number_format($sp['gia_san_pham'], 0, ',', '.'); ?> VNĐ</td>
                                                            <td>
                                                                <img src="./images/category/<?= $sp['hinh_anh']; ?>" width="100" alt="Hình ảnh sản phẩm">
                                                            </td>
                                                            <td><?= $sp['so_luong']; ?></td>
                                                            <td><?= date('d-m-Y', strtotime($sp['ngay_nhap'])); ?></td>
                                                            <td><?= $sp['danh_muc_id'] == 1 ? 'Giày' : 'Quần Áo'; ?></td>
                                                            <td><?= $sp['trang_thai'] == 1 ? 'Còn Hàng' : 'Tạm Hết'; ?></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="index.php?act=detail-san-pham&id=<?= $sp['id'] ?>" class="btn btn-success" title="Xem chi tiết" style="margin-right: 5px;">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                    <a href="index.php?act=edit-san-pham&id=<?= $sp['id'] ?>" class="btn btn-primary" title="Chỉnh sửa" style="margin-right: 5px;">
                                                                        <i class="ri-settings-fill"></i>
                                                                    </a>
                                                                    <a href="index.php?act=xoa-san-pham&id=<?= $sp['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" title="Xóa">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include '../views/admin/layout/footer.php' ?>