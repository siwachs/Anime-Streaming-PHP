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
                            <h5 class="card-title mb-4 d-inline">Episodes</h5>
                            <a href="/admin/create-episode" class="btn btn-primary mb-4 text-center ms-3">Create Episodes</a>

                            <table class="table">
                                <caption>
                                    List of Episodes
                                </caption>
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Video</th>
                                        <th scope="col">Thumbnail</th>
                                        <th scope="col">Name</th>

                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($episodes as $episode) : ?>
                                        <tr>
                                            <th scope="row"><?= $episode['id'] ?></th>
                                            <td><?= $episode['video'] ?></td>
                                            <td><img src="<?= $episode['thumbnail'] ?>" alt="<?= $episode['title'] ?>" class="img-thumbnail small-image" /></td>
                                            <td><?= $episode['title'] ?></td>
                                            <td>
                                                <a href="/admin/delete/episode?id=<?= $episode['id'] ?>" class="btn btn-danger text-center">Delete</a>
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