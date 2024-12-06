<?php include '../views/admin/layout/header.php'; ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <h4 class="fs-16 mb-1">Chào bạn đã đến với trang thống kê</h4>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- Tổng doanh thu -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng doanh thu</p>
                                        <?=($tongDoanhThu)   ?> VND
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <!-- Tổng lượt đặt đơn -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng lượt đặt đơn</p>
                                        <?=($soDonHang) ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <!-- Số lượng khách hàng -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Số lượng khách hàng</p>
                                        <?=($soKhachHang)?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <!-- Sản phẩm đã bán -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Sản phẩm đã bán</p>
                                        <?= ($soSanPhamBanDuoc) ?>
                                    </div>
                                </div>
                            </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../views/admin/layout/footer.php'; ?>