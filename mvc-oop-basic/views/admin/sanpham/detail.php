<?php include '../views/admin/layout/header.php'; ?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Chi Tiết Sản Phẩm</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row gx-lg-5">
                                <div class="col-xl-4 col-md-8 mx-auto">
                                    <div class="product-img-slider sticky-side-div">
                                        <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="./images/category/<?= $sanPham['hinh_anh']; ?>" class="img-fluid d-block">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8">
                                    <div class="product-details mt-xl-0 mt-5">

                                        <!-- Product Name and Edit Button -->
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="product-title">Tên Sản Phẩm: <?= $sanPham['ten_san_pham'] ?></h5>
                                        </div>

                                        <!-- Product Information -->
                                        <div class="product-info mt-4">
                                            <h3 class="fs-14">Thông Tin</h3>
                                            <table class="table table-bordered mt-3">
                                                <tbody>
                                                    <tr>
                                                        <th>Giá Tiền</th>
                                                        <td><?= $sanPham['gia_san_pham'] . ' VND' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Giảm Giá</th>
                                                        <td><?= $sanPham['gia_khuyen_mai'] . ' VND' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Số Lượng</th>
                                                        <td><?= $sanPham['so_luong'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ngày Nhập</th>
                                                        <td><?= $sanPham['ngay_nhap'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Danh Mục</th>
                                                        <td><?= $sanPham['ten_danh_muc'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Trạng Thái</th>
                                                        <td><?= $sanPham['trang_thai'] == 1 ? 'Còn Hàng' : 'Hết Hàng' ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Product Description -->
                                        <div class="product-description ">
                                            <h3 class="fs-14">Mô Tả:</h3>
                                            <div class="description-content border border-dashed rounded p-3 mt-3" data-simplebar style="max-height: 225px;">
                                                <p class="text-muted mb-0"><?= $sanPham['mo_ta'] ?></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Bình Luận</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ Tên</th>
                                        <th>Nội Dung</th>
                                        <th>Ngày Đăng</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= htmlspecialchars($binhLuan['ho_ten']) ?></td>
                                            <td><?= htmlspecialchars($binhLuan['noi_dung']) ?></td>
                                            <td><?= htmlspecialchars($binhLuan['ngay_dang']) ?></td>
                                            <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển Thị' : 'Bị Ẩn' ?></td>
                                            <td>
                                                <form action="?act=update-trang-thai-binh-luan" method="post" onsubmit="this.querySelector('button').disabled = true;">
                                                    <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                                    <input type="hidden" name="name_view" value="detail_san_pham">
                                                    <input type="hidden" name="id_khach_hang" value="<?= $binhLuan['tai_khoan_id'] ?>">
                                                    <button class="btn btn-primary" onclick="return confirm('Bạn có muốn thay đổi trạng thái bình luận này?')">
                                                        <?= $binhLuan['trang_thai'] == 1 ? '<i class="ri-eye-line"></i>' : '<i class="ri-eye-off-line"></i>' ?>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- End Table Section -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
    </div>
    <script src="admin/assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="admin/assets/js/pages/ecommerce-product-details.init.js"></script>
    <script src="admin/assets/js/app.js"></script>
</div>

<?php include '../views/admin/layout/footer.php'; ?>