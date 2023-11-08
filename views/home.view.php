<?php
require_once './components/head.html.php';
?>

<body>
  <?php
  include_once './components/loader.html.php';
  include_once './components/header.html.php';
  include_once './components/home/hero.html.php';
  ?>

  <section>
    <div class="product spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <?php
            include_once './components/home/trending.html.php';
            include_once './components/home/popular.html.php';
            include_once './components/home/recent.html.php';
            include_once './components/home/live.html.php';
            ?>
          </div>
          <div class="col-sm-8 col-md-6 col-lg-4">
            <?php
            include_once './components/home/sidebar.html.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include_once './components/footer.html.php';
  require_once './components/scripts.php'; ?>
</body>

</html>