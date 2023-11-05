<?php
require_once './components/head.html.php';
?>

<body>
    <?php
    include_once './components/loader.html.php';
    include_once './components/header.html.php'; ?>

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="<?php echo BASE; ?>assets/img/normal-breadcrumb.jpg">
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
                        <form action="#">
                            <div class="input__item ">
                                <input class="col-md-12" type="text" placeholder="Email address">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Your Name">
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Conform Password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Login Now</button>
                        </form>
                        <h5>Already have an account? <a href="#">Log In!</a></h5>
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
