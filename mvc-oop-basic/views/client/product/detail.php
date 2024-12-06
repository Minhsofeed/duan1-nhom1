<?php include '../views/client/layout/header.php'; ?>

<div class="product_details variable_product mt-4">
    <div class="container">
        <div class="row">
            <!-- Product Image Section -->
            <div class="col-lg-4 col">
                <div class="product-image">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <img src="./images/category<?= $showDetailSanPhamClient['hinh_anh']; ?>" width="400px" height="600px" style="object-fit: cover; display: block; margin: 0 auto;" />
                    </div>

                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="product-details">
                    <h1 class="product-title"><?= $showDetailSanPhamClient['ten_san_pham']; ?></h1>
                    <div class="price-box mb-3">
                        <h2>
                            <span class="current-price text-danger fw-bold">
                                <?= number_format($showDetailSanPhamClient['gia_khuyen_mai']); ?> VND
                            </span>
                            <span class="old-price text-muted text-decoration-line-through ms-2">
                                <?= number_format($showDetailSanPhamClient['gia_san_pham']); ?> VND
                            </span>
                        </h2>
                    </div>

                    <div class="product-description mb-3">
                        <p><?= nl2br($showDetailSanPhamClient['mo_ta']); ?></p>
                    </div>
                    <form action="?act=addToCart" method="post" class="add-to-cart-form">
                        <div class="product-quantity mb-3">
                            <label for="quantity" class="form-label">Số Lượng:</label>
                            <input type="hidden" name="san_pham_id" value="<?= $showDetailSanPhamClient['id']; ?>">
                            <input type="number" id="quantity" name="so_luong" class="form-control" min="1" value="1">
                        </div>
                        <button class="btn btn-danger w-100" type="submit">Thêm Vào Giỏ Hàng</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="product-reviews mt-5">
            <div class="container">
                <ul class="nav nav-tabs" id="reviewTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="write-review-tab" data-bs-toggle="tab" data-bs-target="#write-review" type="button" role="tab" aria-controls="write-review" aria-selected="true">Viết Bình Luận</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="customer-reviews-tab" data-bs-toggle="tab" data-bs-target="#customer-reviews" type="button" role="tab" aria-controls="customer-reviews" aria-selected="false">Đánh Giá Khách Hàng</button>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="reviewTabContent">
                    <div class="tab-pane fade show active" id="write-review" role="tabpanel" aria-labelledby="write-review-tab">
                        <div class="p-4 bg-light rounded-3">
                            <h3 class="mb-4">Viết Bình Luận</h3>
                            <?php if (isset($_SESSION['user'])): ?>
                                <form action="?act=comment-processing&san_pham_id=<?= urlencode($_GET['san_pham_id']); ?>" method="POST">
                                    <div class="mb-3">
                                        <label for="review_comment" class="form-label">
                                            <h4><?= $_SESSION['user']['ho_ten']; ?></h4>
                                        </label>
                                        <textarea name="comment" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Gửi Đánh Giá</button>
                                    </div>
                                </form>
                            <?php else: ?>
                                <p class="text-muted">Bạn cần <a href="?act=login">đăng nhập</a> để viết bình luận.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="customer-reviews" role="tabpanel" aria-labelledby="customer-reviews-tab">
                        <div class="p-4 bg-light rounded-3">
                            <h3 class="mb-4">Đánh Giá Từ Khách Hàng</h3>
                            <?php if (empty($showDetatilBinhLuanSanPham)): ?>
                                <p class="text-muted">Chưa có đánh giá nào. Hãy là người đầu tiên chia sẻ ý kiến của bạn!</p>
                            <?php else: ?>
                                <div class="review-list">
                                    <?php foreach ($showDetatilBinhLuanSanPham as $binhLuan): ?>
                                        <?php if ($binhLuan['trang_thai'] == 1): ?>
                                            <div class="review-item mb-4 p-3 border rounded bg-white shadow-sm">
                                                <div class="review-header d-flex justify-content-between align-items-center mb-2">
                                                    <h5 class="m-0"><?= $binhLuan['ho_ten']; ?></h5>
                                                    <p class="mb-0 text-muted"><small><?= date('d-m-Y', strtotime($binhLuan['ngay_dang'])); ?></small></p>
                                                </div>
                                                <div class="review-content">
                                                    <p class="m-0"><?= nl2br($binhLuan['noi_dung']); ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form[action="?act=comment-processing&san_pham_id=<?= ($_GET['san_pham_id']); ?>"]');
        if (form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(form);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', form.action, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            const reviewList = document.querySelector('.review-list');
                            const newReview = document.createElement('div');
                            newReview.classList.add('review-item', 'mb-4', 'p-3', 'border', 'rounded', 'bg-white', 'shadow-sm');
                            newReview.innerHTML = `
                                <div class="review-header d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="m-0"><?= $_SESSION['user']['ho_ten']; ?></h5>
                                    <p class="mb-0 text-muted"><small>${new Date().toLocaleDateString()}</small></p>
                                </div>
                                <div class="review-content">
                                    <p class="m-0">${formData.get('comment')}</p>
                                </div>
                            `;
                            reviewList.appendChild(newReview);
                            form.reset();
                        }
                    } else {
                        alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
                    }
                };
                xhr.send(formData);
            });
        }
    });
</script>
<?php include '../views/client/layout/footer.php'; ?>