<?php
include_once './components/admin/head.html.php';
?>

<body>
  <div id="wrapper">
    <?php
    include_once './components/admin/header.html.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                </div>

                <!-- Submit button -->
                <button type="submit" name="getAdmin" class="btn btn-primary mb-4 text-center">
                  Signin
                </button>
              </form>
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