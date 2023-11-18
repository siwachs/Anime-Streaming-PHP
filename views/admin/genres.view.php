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
                            <h5 class="card-title mb-4 d-inline">Genres</h5>
                            <a href="/admin/create-genre" class="btn btn-primary mb-4 text-center ms-3">Create Genres</a>

                            <table class="table">
                                <caption>
                                    List of genres
                                </caption>
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($genres as $genre) : ?>
                                        <tr>
                                            <th scope="row"><?= $genre['id'] ?></th>
                                            <td><?= $genre['name'] ?></td>
                                            <td>
                                                <a href="/admin/delete/genre?id=<?= $genre['id'] ?>" class="btn btn-danger text-center">Delete</a>
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