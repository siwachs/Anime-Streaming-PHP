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
                        <a href="/genres?name=<?= explode(',', $show['genres'])[0] ?>">
                            <?= explode(',', $show['genres'])[0] ?>
                        </a>
                        <span>
                            <?= $show['title'] ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="<?= $show['poster'] ?>">
                            <div class="comment"><i class="fa fa-comments"></i>0</div>
                            <div class="view"><i class="fa fa-eye"></i>
                                <?= $show['numOfViews'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>
                                    <?= $show['title'] ?>
                                </h3>
                            </div>

                            <p>
                                <?= $show['description'] ?>
                            </p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span>
                                                <?= $show['type'] ?>
                                            </li>
                                            <li><span>Studios:</span>
                                                <?= $show['studios'] ?>
                                            </li>
                                            <li><span>Date aired:</span>
                                                <?= $show['dateAired'] ?>
                                            </li>
                                            <li><span>Status:</span>
                                                <?= $show['status'] ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li>
                                                <span>Genre:</span>
                                                <?= $show['genres'] ?>
                                            </li>

                                            <li><span>Duration:</span>
                                                <?= $show['duration'] ?>
                                            </li>
                                            <li><span>Quality:</span>
                                                <?= $show['quality'] ?>
                                            </li>
                                            <li><span>Views:</span>
                                                <?= $show['numOfViews'] ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="anime__details__btn">
                                <form action="" method="post">
                                    <input type="text" value="<?= $_GET['id'] ?>" name="showId" hidden>
                                    <input type="text" value="<?= isset($_SESSION['id']) ? $_SESSION['id'] : '' ?>" name="userId" hidden>
                                    <?php if ($isFollowed) : ?>
                                        <button class="follow-btn" disabled><i class="fa fa-heart-o"></i>Followed</button>
                                    <?php else : ?>
                                        <button name="followShow" class="follow-btn"><i class="fa fa-heart-o"></i>Follow</button>
                                    <?php endif; ?>

                                    <?php if (isset($show['epId'])) : ?>
                                        <a href="/anime-watching?id=<?= $show['id'] ?>&ep=<?= $show['epId'] ?>" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <?php foreach ($comments as $comment) : ?>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="https://i.pinimg.com/736x/0a/53/c3/0a53c3bbe2f56a1ddac34ea04a26be98.jpg" alt="" />
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>
                                        <?= $comment['username'] ?> - <span>
                                            <?= $comment['created_at'] ?>
                                        </span>
                                    </h6>
                                    <p>
                                        <?= $comment['comment'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Review</h5>
                        </div>

                        <form action="" method="post">
                            <textarea name="comment" placeholder="Your Comment"></textarea>
                            <button name="submitComment" type="submit">
                                <i class="fa fa-location-arrow"></i> Review
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>

                        <?php foreach ($youMightLike as $show) : ?>
                            <div class="product__sidebar__view__item set-bg" data-setbg="<?= $show['thumbnail'] ?>">
                                <div class="ep">
                                    <?= $show['numOfEpisodesAvail'] ?> /
                                    <?= $show['totalEpisodes'] ?>
                                </div>
                                <div class="view"><i class="fa fa-eye"></i>
                                    <?= $show['numOfViews'] ?>
                                </div>
                                <h5><a href="/anime-details?id=<?= $show['id'] ?>">
                                        <?= $show['title'] ?>
                                    </a></h5>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once './components/footer.html.php';
    require_once './components/model.html.php';
    require_once './components/scripts.php'; ?>
</body>

</html>