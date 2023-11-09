<div class="product__sidebar">
    <div class="product__sidebar__view">
    </div>
</div>
<div class="product__sidebar__comment">
    <div class="section-title">
        <h5>For You</h5>
    </div>
    <?php foreach ($forYouSection as $show) : ?>
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img src="img/sidebar/comment-1.jpg" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <?php
                    $genres = explode(',', $show['genres']);

                    foreach ($genres as $genre) {
                        echo '<li>' . $genre . '</li>';
                    }
                    ?>
                </ul>
                <h5><a href="#"><?= $show['title'] ?></a></h5>
                <span><i class="fa fa-eye"></i> <?= $show['numOfViews'] ?> Viewes</span>
            </div>
        </div>
    <?php endforeach; ?>
</div>