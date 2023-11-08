<?php
require_once './components/head.html.php';
?>

<body>
    <?php
    include_once './components/loader.html.php';
    include_once './components/header.html.php'; ?>

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="/assets/img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Sign In</h2>
                        <p>Welcome to the official Anime blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Sign In</h3>
                        <form action="/auth/signin" method="post">
                            <div class="input__item">
                                <input name="email" type="text" placeholder="Email address">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input name="password" type="password" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <button name="submit" type="submit" class="site-btn">SignIn Now</button>
                        </form>
                        <a href="#" class="forget_pass">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Dont’t Have An Account?</h3>
                        <a href="/auth/signup" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Login Section End -->

    <?php
    include_once './components/footer.html.php';
    include_once './components/model.html.php';
    include_once './components/scripts.php'; ?>
</body>

</html>
