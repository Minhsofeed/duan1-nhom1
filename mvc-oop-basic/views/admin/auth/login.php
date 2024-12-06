<?php include '../views/admin/layout/headerlogin.php' ?>
<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index.html" class="d-inline-block auth-logo">
                                <img src="admin/assets/images/g1.png" alt="" height="200">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            <div class="p-2 mt-4">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Đăng Nhập</h5>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <form action="index.php?act=login" method="post">
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="useremail" name="email" placeholder="Nhập Email">
                                                <div class="invalid-feedback"></div>
                                                <?php if (isset($_SESSION['errors']['email'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Mật Khẩu</label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" class="form-control pe-5 password-input" id="password-input" placeholder="Nhập Mật Khẩu" name="password">
                                                </div>
                                                <?php if (isset($_SESSION['errors']['password'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <button class="btn btn-primary w-100" type="submit">Đăng Nhập</button>
                                        </form>
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
<?php session_unset() ?>
<?php include '../views/admin/layout/footerlogin.php' ?>