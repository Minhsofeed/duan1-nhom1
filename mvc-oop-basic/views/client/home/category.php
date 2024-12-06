<?php include '../views/client/layout/header.php' ?>
<div class="header_bottom header_b_three sticky-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="main_menu header_position">
                    <nav>
                        <ul>
                            <?php foreach ($danhMuc as $dm) : ?>
                                <li><a href="?act=filter-product&danh_muc_id=<?= $dm['id'] ?>"><?= $dm['ten_danh_muc'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>
<section class="slider_section color_scheme_2 mb-42">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Slider với một ảnh duy nhất -->
                <div class="slider">
                    <img id="slideImage" src="client/assets/img/slider/slide13.jpg">
                </div>
            </div>
        </div>
    </div>
    <script>
        let images = [
            'client/assets/img/slider/slide13.jpg',
            'client/assets/img/slider/slide33.png',
            'client/assets/img/slider/slide21.jpg'
        ];


        let currentIndex = 0;
        let slideImage = document.getElementById('slideImage');


        function changeImage() {
            currentIndex = (currentIndex + 1) % images.length;

            slideImage.style.opacity = 0;


            setTimeout(() => {
                slideImage.src = images[currentIndex];
                slideImage.style.opacity = 1;
            }, 1000);
        }

        setInterval(changeImage, 3000);
    </script>
</section>
<div class="shop_area shop_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop_title" style="display: flex; justify-content: center; align-items: center; text-align: center;">
                    <h3>Sản Phẩm Của Chúng Tôi</h3>
                </div>
                <div class="row shop_wrapper">
                    <?php foreach ($filterProduct as $sp): ?>
                        <?php if ($sp['danh_muc_id'] == $_GET['danh_muc_id']): ?>
                            <div class="col-lg-3 col-md-4 col-12">
                                <div class="single_product">
                                    <div class="product_name grid_name">
                                        <h3>
                                            <a href="?act=detail-pro&san_pham_id=<?= $sp['id'] ?>">
                                                <?= $sp['ten_san_pham'] ?>
                                            </a>
                                        </h3>
                                    </div>

                                    <div class="product_thumb">
                                        <a class="primary_img" href="?act=detail-pro&san_pham_id=<?= $sp['id'] ?>">
                                            <img src="./images/category/<?= $sp['hinh_anh']; ?>" alt="<?= $sp['ten_san_pham']; ?>" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="content_inner">
                                            <div class="product_footer d-flex align-items-center">
                                                <div class="price_box">
                                                    <?php if (!empty($sp['gia_khuyen_mai'])): ?>
                                                        <span class="current_price"><?= $sp['gia_khuyen_mai'] ?> VND</span>
                                                        <span class="old_price" style="text-decoration: line-through;">
                                                            <?= $sp['gia_san_pham'] ?> VND
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="current_price"><?= $sp['gia_san_pham'] ?> VND</span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="add_to_cart">
                                                    <a href="?act=add-to-cart&san_pham_id=<?= $sp['id'] ?>" title="Thêm vào giỏ hàng">
                                                        <span class="lnr lnr-cart"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../views/client/layout/footer.php' ?>