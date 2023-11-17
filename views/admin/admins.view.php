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
              <h5 class="card-title mb-4 d-inline">Admins</h5>
              <a href="/admin/create-admin" class="btn btn-primary mb-4 text-center ms-3">Create Admins</a>
              <table class="table">
                <caption>List of Admins</caption>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($admins as $admin) : ?>
                    <tr>
                      <th scope="row"><?= $admin['id'] ?></th>
                      <td><?= $admin['adminname'] ?></td>
                      <td><?= $admin['email'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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