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
                        <h2>Sign Up</h2>
                        <p>Welcome to the official Aniflix.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login__form">
                        <h3>Sign Up</h3>
                        <form action="" method="post">
                            <div class="input__item ">
                                <input name="email" class="col-md-12" type="text" placeholder="Email address">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input name="username" type="text" placeholder="Your Name">
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input name="password" type="password" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input name="confirmPassword" type="password" placeholder="Conform Password">
                                <span class="icon_lock"></span>
                            </div>
                            <button name="registerUser" type="submit" class="site-btn">Signup Now</button>
                        </form>
                        <h5>Already have an account?<a href="/auth/signin">Sign In!</a></h5>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Signup Section End -->

    <?php
    include_once './components/footer.html.php';
    include_once './components/model.html.php';
    include_once './components/scripts.php'; ?>
</body>

</html>