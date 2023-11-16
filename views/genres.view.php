<?php
require_once './components/head.html.php';
?>

<body>
    <?php
    require_once './components/loader.html.php';
    require_once './components/header.html.php';
    ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/genres">Genres</a>
                        <span>
                            <?= isset($_GET['name']) ? $_GET['name'] : 'All' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>
                                            <?= isset($_GET['name']) ? $_GET['name'] : 'All' ?>
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <?php if (empty($showsByGenre)) : ?>
                                <h3 class="text-white">No shows available.</h3>
                            <?php else : ?>
                                <?php foreach ($showsByGenre as $show) : ?>
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="<?= $show['poster'] ?>">
                                                <div class="ep">
                                                    <?= $show['numOfEpisodesAvail'] ?> /
                                                    <?= $show['totalEpisodes'] ?>
                                                </div>
                                                <div class="comment"><i class="fa fa-comments"></i> 0</div>
                                                <div class="view"><i class="fa fa-eye"></i>
                                                    <?= $show['numOfViews'] ?>
                                                </div>
                                            </div>
                                            <div class="product__item__text">
                                                <ul>
                                                    <?= '<li>' . implode('</li><li>', array_map('trim', explode(',', $show['genres']))) . '</li>'; ?>
                                                </ul>
                                                <h5><a href="/anime-details?id=<?= $show['id'] ?>">
                                                        <?= $show['title'] ?>
                                                    </a></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="col-sm-8 col-md-6 col-lg-4">
                    <?php
                    include_once './components/home/sidebar.html.php'; ?>
                </div>
            </div>
        </div>
        </div>
    </section>

    <?php
    require_once './components/footer.html.php';
    require_once './components/scripts.php'; ?>
</body>

</html>