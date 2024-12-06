<hr>
<footer class="footer_widgets">
    <div class="container">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="#"><img src="client/client/client/assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <p>Chúng tôi là một nhóm thiết kế và lập trình</p>
                            <p><span>Địa Chỉ</span>Nam Từ Liêm,Hà Nội</p>
                            <p><span>Cần Trợ Giúp</span>Liên Hệ: <a href="tel:1-800-345-6789">1-800-345-6789</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Thông Tin</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="about.html">Về Chúng Tôi</a></li>
                                <li><a href="#">Thông Tin Giao Hàng</a></li>
                                <li><a href="privacy-policy.html">Chính Sách Bảo Mật</a></li>
                                <li><a href="#">Điều khoản & Điều kiện</a></li>
                                <li><a href="#">Quay lại</a></li>
                                <li><a href="#">Quà Tặng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Extras</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Quay lại</a></li>
                                <li><a href="#">Lịch Sử Giao Dich</a></li>
                                <li><a href="wishlist.html">Danh sách mong muốn</a></li>
                                <li><a href="#">Bản Tin</a></li>
                                <li><a href="#">Liên Kết</a></li>
                                <li><a href="#">Đặc Biệt</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container">
                        <h3>Đăng Ký Để Nhận Được thông báo</h3>
                        <p>Chúng tôi sẽ không bao giờ chia sẻ địa chỉ email của bạn với bên thứ ba.</p>
                        <div class="subscribe_form">
                            <form id="mc-form" class="mc-form footer-newsletter">
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Điền Email của bạn vào đây..." />
                                <button id="mc-submit">Đăng Ký</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>Copyright &copy; 2021 <a href="#">Autima</a> All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment text-right">
                        <a href="#"><img src="client/client/client/assets/img/icon/payment.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- JS
============================================ -->
<!--jquery min js-->
<script src="client/assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="client/assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="client/assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="client/assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="client/assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="client/assets/js/jquery.magnific-popup.min.js"></script>
<!--jquery countdown min js-->
<script src="client/assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="client/assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="client/assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="client/assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="client/assets/js/slinky.menu.js"></script>
<!-- Plugins JS -->
<script src="client/assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="client/assets/js/main.js"></script>



</body>

<?php
// Kiểm tra nếu session có thông báo thành công
if (isset($_SESSION['success'])) {
    echo "<script>
                    Toastify({
                        text: '{$_SESSION['success']}',
                        style: {
                            background: 'rgba(0, 128, 0, 0.7)', 
                            fontSize: '18px', 
                            width: '250px', 
                            height: '60px',  
                        },
                        duration: 3000
                    }).showToast();
                </script>";
    unset($_SESSION['success']);
}

if (isset($_SESSION['errors'])) {
    echo "<script>
                    Toastify({
                        text: '{$_SESSION['errors']}',
                        style: {
                            background: 'rgba(255, 0, 0, 0.7)',
                            fontSize: '18px',
                            width: '250px', 
                            height: '60px',  
                        },
                        duration: 3000
                    }).showToast();
                </script>";
    unset($_SESSION['errors']);
}
?>
<!-- Mirrored from htmldemo.net/autima/autima/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 09:08:19 GMT -->

</html>