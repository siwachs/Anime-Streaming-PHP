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
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="poster" class="form-label">Poster</label>
                                    <input type="file" name="poster" id="poster" class="form-control" />
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
                                    <select name="genresArray[]" id="genres" class="form-select form-control" multiple>
                                        <?php foreach ($genres as $genre) : ?>
                                            <option value="<?= $genre['name'] ?>">
                                                <?= $genre['name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="form-outline mb-4 mt-4">
                                    <label for="duration" class="form-label">Duration</label>
                                    <input type="text" name="duration" id="duration" class="form-control" placeholder="Duration" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="quality" class="form-label">Quality</label>
                                    <input type="text" name="quality" id="quality" class="form-control" placeholder="Quality" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="num_available" class="form-label">Number of Available Episodes</label>
                                    <input min="0" value="0" type="number" name="numOfAvailEpisodes" id="num_available" class="form-control" placeholder="Number Available" />
                                </div>

                                <div class="form-outline mb-4 mt-4">
                                    <label for="num_total" class="form-label">Total Number of Episodes</label>
                                    <input min="0" value="0" type="number" name="numOfTotalEpisodes" id="num_total" class="form-control" placeholder="Total Number" />
                                </div>

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

    <?php
    include_once './components/admin/scripts.php'; ?>
</body>

</html>