<nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="/admin">
            <img src="/assets/img/logo.png" alt="" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <!-- Navbar start -->
            <ul class="navbar-nav ml-md-auto d-md-flex ms-3">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Home
                    </a>
                </li>

                <?php if (isset($_SESSION['adminId'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/list" style="margin-left: 20px">Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/shows" style="margin-left: 20px">Shows</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/genres" style="margin-left: 20px">Genres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="episodes-admins/show-episodes.html" style="margin-left: 20px">Episodes</a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['adminname'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['adminname'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/admin/signout">Signout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/signin">Signin</a>
                    </li>
                <?php endif; ?>

            </ul>
            <!-- Navbar end -->
        </div>

    </div>
</nav>