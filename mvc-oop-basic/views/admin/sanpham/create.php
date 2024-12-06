<?php include '../views/admin/layout/header.php' ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Trang Thêm Sản Phẩm</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
          

            <form action="index.php?act=them-san-pham" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab" aria-selected="true">
                                            Bảng Thêm Sản Phẩm
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Tên Sản phẩm</label>
                                                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập sản phẩm">
                                                    <?php if(isset($_SESSION['errors']['ten_san_pham'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                                                <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Danh Mục</label>
                                                    <select class="form-select" aria-label="Default select example" name="danh_muc_id">
                                                        <option selected>Chọn Danh Mục</option>
                                                        <option value="1">Quần áo bóng đá</option>
                                                        <option value="2"> giày</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label"> Giá Khuyến Mại</label>
                                                    <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá khuyến mại">
                                                    <?php if(isset($_SESSION['errors']['gia_san_pham'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Giá sản phẩm </label>
                                                    <input type="number" class="form-control" name="gia_khuyen_mai"  placeholder="Nhập giá sản phẩm ">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Số Lượng</label>
                                                    <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                                                    <?php if(isset($_SESSION['errors']['so_luong'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Ngày Nhập</label>
                                                    <input type="date" class="form-control" name="ngay_nhap" placeholder="Ngày nhập">
                                                    <?php if(isset($_SESSION['errors']['ngay_nhap'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Trạng Thái</label>
                                                    <select class="form-select" aria-label="Default select example" name="trang_thai">
                                                        <option selected>Trạng Thái</option>
                                                        <option value="1">Còn Hàng</option>
                                                        <option value="2">Hết hàng</option>
                                                    </select>
                                                    <?php if(isset($_SESSION['errors']['trang_thai'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- File Upload Section (Single image) -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Thêm Ảnh</label>
                                                    <div class="input-group">  
                                                    <input class="form-control" name="hinh_anh" type="file" id="hinh_anh">
                                                    <button class="btn btn-outline-secondary">Chọn ảnh</button>
                                                    </div>
                                                        
                                                    <?php if(isset($_SESSION['errors']['hinh_anh'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?></p>
                                                <?php endif; ?>
                                                    </div>
                                                </div>             
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Mô tả</label>
                                                        <textarea class="form-control" name="mo_ta" placeholder="Nhập mô tả" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end tab-pane -->
                                   
                                </div>
                                <!-- end tab content -->

                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <div class="text-end mb-3">
                            <a href="index.php?act=san-pham"class="btn btn-primary w-sm">Quay lại</a>
                            <button type="submit" name="them-san-pham" class="btn btn-secondary w-sm">Thêm mới</button>
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