<div class="popular__product">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="section-title">
                <h4>Adventure Shows</h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="btn__all">
                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($adventureShows as $show): ?>
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
                            <?php
                            $genres = explode(',', $show['genres']);

                            foreach ($genres as $genre) {
                                echo '<li>' . $genre . '</li>';
                            }
                            ?>
                        </ul>
                        <h5><a href="/anime-details?id=<?= $show['id'] ?>">
                                <?= $show['title'] ?>
                            </a></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>