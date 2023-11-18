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
                            <h5 class="card-title mb-5 d-inline">Create Episode</h5>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="form-outline mb-4 mt-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/*" />
                                </div>

                                <div class=" form-outline mb-4 mt-4">
                                    <label for="video" class="form-label">Video</label>
                                    <input type="file" name="video" id="video" class="form-control" accept="video/*" />
                                </div>

                                <div class="form-group mb-4 mt-4">
                                    <label for="show" class="form-label">Shows:</label>
                                    <select name="show" id="show" class="form-select form-control" aria-label="Default select example">
                                        <?php foreach ($shows as $show) : ?>
                                            <?php
                                            $showData = [
                                                'id' => $show['id'],
                                                'title' => $show['title']
                                            ];
                                            $jsonData = json_encode($showData);
                                            ?>
                                            <option value="<?= htmlspecialchars($jsonData) ?>"><?= $show['title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <button type="submit" name="createEpisode" class="btn btn-primary mb-4 text-center">Create</button>
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