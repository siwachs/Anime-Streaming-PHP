<?php
include_once './components/admin/head.html.php';
?>

<body>
  <div id="wrapper">
    <?php
    include_once './components/admin/header.html.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Shows</h5>
              <p class="card-text">Number of shows: <?= $stats['showsCount'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Episodes</h5>

              <p class="card-text">Number of episodes: <?= $stats['episodesCount'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Genres</h5>

              <p class="card-text">Number of genres: <?= $stats['genresCount'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>

              <p class="card-text">Number of admins: <?= $stats['adminCount'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include_once './components/admin/scripts.php'; ?>
</body>

</html>