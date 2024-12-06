<?php include '../views/client/layout/header.php' ?>
<div class="customer_login mt-32">
    <div class="container">
        <div class="row">
            <!--register area start-->
            <div class="row">
                <!--register area start-->
                <div class="col-lg-12 col-md-12">
                    <div class="account_form register">
                        <h2 class="text-center">Đăng Ký</h2> <!-- Canh giữa tiêu đề -->
                        <form action="?act=register" method="POST">
                            <p>
                                <label>Nhập Tên Đăng Ký</label>
                                <input type="text" name="name" class="form-control">
                                <?php if (isset($_SESSION['errors']['password'])): ?>
                            <p class="text-danger"><?= htmlspecialchars($_SESSION['errors']['name']) ?></p>
                        <?php endif; ?>
                        </p>
                        <p>
                            <label>Nhập Email</label>
                            <input type="text" name="email" class="form-control">
                            <?php if (isset($_SESSION['errors']['password'])): ?>
                        <p class="text-danger"><?= htmlspecialchars($_SESSION['errors']['email']) ?></p>
                    <?php endif; ?>
                    </p>
                    <p>
                        <label>Nhập Password</label>
                        <input type="password" name="password" class="form-control">
                        <?php if (isset($_SESSION['errors']['password'])): ?>
                    <p class="text-danger"><?= htmlspecialchars($_SESSION['errors']['password']) ?></p>
                <?php endif; ?>
                </p>
                <div class="d-flex justify-content-center"> <!-- Đưa nút ra giữa -->
                    <button type="submit" name="register" class="btn btn-primary">Đăng Ký</button>
                </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
            <!--register area end-->
        </div>
    </div>
</div>
<?php include '../views/client/layout/footer.php' ?>