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
                            <h5 class="card-title mb-5 d-inline">Create Show</h5>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="form-outline mb-4 mt-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" name="image" id="thumbnail" class="form-control" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="poster" class="form-label">Poster</label>
                                    <input type="file" name="image" id="poster" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>

                                <div class="form-group mb-4 mt-4">
                                    <label for="show-type" class="form-label">Show Type:</label>
                                    <select name="showType" id="show-type" class="form-select form-control" aria-label="Default select example">
                                        <option selected value="Tv Series">Tv Series</option>
                                        <option value="Movie">Movie</option>
                                        <option value="Live Action">Live Action</option>
                                        <option value="No Copyright">No Copyright</option>
                                    </select>
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="studios" class="form-label">Studios</label>
                                    <input type="text" name="studios" id="studios" class="form-control" placeholder="Studios" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="date_aired" class="form-label">Date Aired</label>
                                    <input type="text" name="dateAired" id="date_aired" class="form-control" placeholder="Date Aired" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" name="status" id="status" class="form-control" placeholder="Status" />
                                </div>


                                <div class="form-outline mb-4 mt-4">
                                    <label for="genres" class="form-label">Genres</label>
                                    <select name="genresArray" id="genres" class="form-select form-control" multiple>
                                        <?php foreach ($genres as $genre) : ?>
                                            <option value="<?= $genre['name'] ?>">
                                                <?= $genre['name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="duration" id="form2Example1" class="form-control" placeholder="duration" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="quality" id="form2Example1" class="form-control" placeholder="quality" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="num_available" id="form2Example1" class="form-control" placeholder="num_available" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="num_total" id="form2Example1" class="form-control" placeholder="num_total" />
                                </div>

                                <br />

                                <!-- Submit button -->
                                <button type="submit" name="createShow" class="btn btn-primary mb-4 text-center">
                                    Create
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>