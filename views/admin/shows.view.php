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
              <h5 class="card-title mb-4 d-inline">Shows</h5>
              <a href="/admin/create-show" class="btn btn-primary mb-4 text-center ms-3">Create Shows</a>

              <table class="table">
                <caption>List of Shows</caption>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date Aired</th>
                    <th scope="col">Status</th>
                    <th scope="col">Genres</th>
                    <th scope="col">Ep Avail</th>
                    <th scope="col">Total Ep</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($shows as $show) : ?>
                    <tr>
                      <th scope="row"><?= $show['id'] ?></th>
                      <td><?= $show['title'] ?></td>
                      <td>
                        <img loading="lazy" src="<?= $show['thumbanil'] ?>" alt="<?= $show['title'] ?>" class="img-thumbnail" />
                      </td>
                      <td>
                        <img loading="lazy" src="<?= $show['poster'] ?>" alt="<?= $show['title'] ?>" class="img-fluid" />
                      </td>
                      <td><?= $show['type'] ?></td>
                      <td><?= $show['dateAired'] ?></td>
                      <td><?= $show['status'] ?></td>
                      <td><?= $show['genres'] ?></td>
                      <td><?= $show['numOfEpisodesAvail'] ?></td>
                      <td><?= $show['totalEpisodes'] ?></td>
                      <td><?= $show['createdAt'] ?></td>
                      <td>
                        <a href="/admin/delete/show?id=<?= $show['id'] ?>" class="btn btn-danger text-center">Delete</a>
                      </td>
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