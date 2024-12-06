<?php include '../views/client/layout/header.php' ?>
<!-- customer login start -->
<div class="customer_login mt-32">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="account_form register">
                    <h2 class="text-center">Đăng Nhập</h2>
                    <form action="?act=signin" method="POST">
                        <p>
                            <label>Nhập Email <span></span></label>
                            <input type="text" name="email" class="form-control">
                            <?php if (isset($_SESSION['errors']['email'])): ?>
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
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" name="login">Đăng Nhập</button>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../views/client/layout/footer.php' ?>