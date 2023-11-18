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
                            <h5 class="card-title mb-5 d-inline">Create Genres</h5>

                            <form method="POST" action="">
                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Name" />
                                </div>

                                <button type="submit" name="createGenre" class="btn btn-primary mb-4 text-center">
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