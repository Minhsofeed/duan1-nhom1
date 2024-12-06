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
                            <p>We are a team of designers and developers that
                                create high quality Magento, Prestashop, Opencart...</p>
                            <p><span>Address</span> 4710-4890 Breckinridge St, UK Burlington, VT 05401</p>
                            <p><span>Need Help?</span>Call: <a href="tel:1-800-345-6789">1-800-345-6789</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="privacy-policy.html">privacy policy</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Gift Certificates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Extras</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="wishlist.html">Wish List</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="#">Affiliate</a></li>
                                <li><a href="#">Specials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container">
                        <h3>Newsletter Subscribe</h3>
                        <p>We’ll never share your email address with a third-party.</p>
                        <div class="subscribe_form">
                            <form id="mc-form" class="mc-form footer-newsletter">
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email address here..." />
                                <button id="mc-submit">Subscribe</button>
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

<?php
if (isset($_SESSION['success'])) {
    echo "<script>
                    Toastify({
                        text: '{$_SESSION['success']}',
                        style: {
                            background: 'rgba(0, 128, 0, 0.7)', 
                            fontSize: '15px', 
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
                            fontSize: '15px',
                            width: '250px', 
                            height: '60px',  
                        },
                        duration: 3000
                    }).showToast();
                </script>";
    unset($_SESSION['errors']);
}
?>
</body>
</html>