<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <?php foreach ($heroSection as $show) : ?>
                <div class="hero__items set-bg" data-setbg="<?= $show['thumbnail'] ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label"><?= $show['genres'] ?></div>
                                <h2><?= $show['title'] ?></h2>
                                <p><?= $show['description'] ?></p>
                                <a href="/anime-watching?id=<?= $show['id'] ?>&ep=<?= $show['epId'] ?>"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
