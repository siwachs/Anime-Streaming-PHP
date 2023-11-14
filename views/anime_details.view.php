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
                        <a href="/genres?name=<?= explode(',', $show[0]['genres'])[0] ?>">
                            <?= explode(',', $show[0]['genres'])[0] ?>
                        </a>
                        <span>
                            <?= $show[0]['title'] ?>
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
                        <div class="anime__details__pic set-bg" data-setbg="<?= $show[0]['poster'] ?>">
                            <div class="comment"><i class="fa fa-comments"></i> 0</div>
                            <div class="view"><i class="fa fa-eye"></i>
                                <?= $show[0]['numOfViews'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>
                                    <?= $show[0]['title'] ?>
                                </h3>
                            </div>

                            <p>
                                <?= $show[0]['description'] ?>
                            </p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span>
                                                <?= $show[0]['type'] ?>
                                            </li>
                                            <li><span>Studios:</span>
                                                <?= $show[0]['studios'] ?>
                                            </li>
                                            <li><span>Date aired:</span>
                                                <?= $show[0]['dateAired'] ?>
                                            </li>
                                            <li><span>Status:</span>
                                                <?= $show[0]['status'] ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li>
                                                <span>Genre:</span>
                                                <?= $show[0]['genres'] ?>
                                            </li>

                                            <li><span>Duration:</span>
                                                <?= $show[0]['duration'] ?>
                                            </li>
                                            <li><span>Quality:</span>
                                                <?= $show[0]['quality'] ?>
                                            </li>
                                            <li><span>Views:</span>
                                                <?= $show[0]['numOfViews'] ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="anime__details__btn">
                                <form action="/anime-details?id=<?= $show[0]['id'] ?>" method="post">
                                    <input type="text" value="<?= $show[0]['id'] ?>" name="show_id" hidden>
                                    <input type="text" value="<?= isset($_SESSION['id']) ? $_SESSION['id'] : '' ?>" name="user_id" hidden>
                                    <?php if (count($isFollowed) > 0) : ?>
                                        <button name="submit" class="follow-btn" disabled><i class="fa fa-heart-o"></i>Followed</button>
                                    <?php else : ?>
                                        <button name="submit" class="follow-btn"><i class="fa fa-heart-o"></i>Follow</button>
                                    <?php endif; ?>

                                    <a href="/anime-watching?id=<?= $show[0]['id'] ?>&ep=1" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
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
                                    <img src="assets/img/anime/review-1.jpg" alt="" />
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
                            <h5>Your Comment</h5>
                        </div>

                        <form action="/anime-details?id=<?= $show[0]['id'] ?>" method="post">
                            <textarea name="comment" placeholder="Your Comment"></textarea>
                            <button name="submit_comment" type="submit">
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