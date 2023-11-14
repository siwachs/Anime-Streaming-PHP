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
                        <a href="/genres?name=<?= explode(',', $show[0]['genres'])[0] ?>"><?= explode(',', $show[0]['genres'])[0] ?></a>
                        <span><?= $show[0]['title'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <video id="player" playsinline controls data-poster="<?= $episode[0]['video_thumbnail'] ?>">
                            <source src="<?= $episode[0]['video'] ?>" type="video/mp4" />

                            <track kind="captions" label="English captions" src="#" srclang="en" default />
                        </video>
                    </div>

                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Episodes List</h5>
                        </div>
                        <?php foreach ($episodesList as $episode) : ?>
                            <a href="/anime-watching?id=<?= $episode['show_id'] ?>&ep=<?= $episode['id'] ?>"><?= $episode['title'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Comments</h5>
                        </div>
                        <div class="anime__review__item">
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
                    </div>

                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>

                        <form action="/anime-watching?id=<?= $_GET['id'] ?>&ep=<?= $_GET['ep'] ?>" method="post">
                            <textarea name="comment" placeholder="Your Comment"></textarea>
                            <button name="ep_comment" type="submit">
                                <i class="fa fa-location-arrow"></i> Review
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->

    <?php
    require_once './components/footer.html.php';
    require_once './components/model.html.php';
    require_once './components/scripts.php'; ?>

</body>

</html>