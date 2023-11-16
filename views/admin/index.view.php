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
              <p class="card-text">number of shows: 8</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Episodes</h5>

              <p class="card-text">number of episodes: 4</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Genres</h5>

              <p class="card-text">number of genres: 4</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>

              <p class="card-text">number of admins: 3</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include_once './components/admin/scripts.php'; ?>
</body>