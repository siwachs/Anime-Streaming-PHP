<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <div class="header__logo">
          <a href="/">
            <img src="/assets/img/logo.png" alt="" />
          </a>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="header__nav">
          <nav aria-label="categories-menu" class="header__menu mobile-menu">
            <ul>
              <li class="active"><a href="/">Home</a></li>
              <li>
                <a href="/genres">Genres <span class="arrow_carrot-down"></span></a>
                <ul class="dropdown">
                  <?php foreach ($genres as $genreItem) : ?>
                    <li><a href="/genres?name=<?= $genreItem['name'] ?>">
                        <?= $genreItem['name'] ?>
                      </a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <?php if (isset($_SESSION['email'])) : ?>
                <li>
                  <a href="#">
                    <?php echo $_SESSION['email']; ?>
                    <span class="arrow_carrot-down"></span>
                  </a>
                  <ul class="dropdown">
                    <li><a href="/user/followings">Followings</a></li>
                    <li><a href="<?php echo "/auth/signout" ?>">Sign Out</a></li>
                  </ul>
                </li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="header__right">
          <form action="/search" method="post" class="d-flex my-2 my-lg-0">
            <input name="keyword" class="form-control mr-sm-2 rounded-0 rounded-start-2" type="search" placeholder="Search" aria-label="Search">
            <button name="submitKeyword" type="submit" class="btn btn-secondary rounded-0"><span class="icon_search"></span></button>
          </form>

          <?php if (!isset($_SESSION['email'])) : ?>
            <a href="/auth/signin"><span class="icon_profile"></span></a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div id="mobile-menu-wrap"></div>
  </div>
</header>