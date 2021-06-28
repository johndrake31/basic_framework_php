<div class="container d-flex">


    <?php

    foreach ($velos as $velo) {
    ?>
        <div class="card m-1" style="width: 18rem;">
            <img src="<?= $velo->image ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $velo->modele ?></h5>
                <p class="card-text">0 add some</p>
                <a href="index.php?controller=velo&task=show&id=<?= $velo->id; ?>" class=" btn btn-primary">Voir ce vélo</a>
            </div>
        </div>

    <?php } ?>
</div>
<hr>