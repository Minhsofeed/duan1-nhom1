    <!-- JAVASCRIPT -->
    <script src="admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="admin/assets/libs/node-waves/waves.min.js"></script>
    <script src="admin/assets/libs/feather-icons/feather.min.js"></script>
    <script src="admin/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="admin/assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="admin/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="admin/assets/libs/jsvectormap/jsvectormap.min.js"></script>
    <script src="admin/assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="admin/assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="admin/assets/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="admin/assets/js/app.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <?php
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
        // Convert the array to a string, escape special characters for safety
        $errorMessages = htmlspecialchars(implode(', ', $_SESSION['errors']));

        echo "<script>
                Toastify({
                    text: '{$errorMessages}',
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

    </body>

    </html>