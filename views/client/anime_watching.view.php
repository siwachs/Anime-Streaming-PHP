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
                        <a href="/genres?name=<?= explode(',', $episode['genres'])[0] ?>"><?= explode(',', $episode['genres'])[0] ?></a>
                        <span><?= $episode['showTitle'] ?></span>
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
                        <video id="player" playsinline controls data-poster="<?= $episode['thumbnail'] ?>">
                            <source src="<?= $episode['video'] ?>" type="video/mp4" />

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
                    </div>

                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>

                        <form action="" method="post">
                            <textarea name="comment" placeholder="Your Comment"></textarea>
                            <button name="submitComment" type="submit">
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