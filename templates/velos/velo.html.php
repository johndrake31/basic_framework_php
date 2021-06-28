<div class="container">
    <div class="card" style="width: 18rem;">
        <img src="<?= $velo->image ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $velo->modele ?></h5>
            <a href="index.php?controller=velo&task=suppr&id=<?= $velo->id; ?>" class="btn btn-danger mb-3 ms-3 ">Delete Bike</a>
        </div>
    </div>
</div>

<hr>
<div class="container">
    <h2 class="text-center">Voyages faits avec ce vélo:</h2>


    <!-- ADD VOYAGE SECTION -->
    <?php if (isset($_GET['addVoyage']) && $_GET['addVoyage'] == 'true') { ?>
        <div class="container">
            <div class="row col-6">
                <h3>Add <?= $velo->modele; ?> Voyage</h3>
                <form action="index.php?controller=voyage&task=create" method="POST">

                    <!-- id -->
                    <input type="hidden" name="velo_id" value="<?= $velo->id; ?>">

                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Voyage Title</label>
                        <!-- description -->
                        <input name="description" type="text" class="form-control" rows="1" id="exampleInputText1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPrice2" class="form-label">Image URL</label>
                        <!-- image -->
                        <textarea class="form-control" name="image" id="exampleInputPrice2" cols="30" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
        <hr>

    <?php } else { ?>

        <a href="index.php?controller=velo&task=show&id=<?= $velo->id; ?>&addVoyage=true" class="btn btn-info mb-3 ms-3 ">Add Voyage</a>

    <?php } ?>




    <div class="d-flex flex-wrap m-1">
        <?php
        foreach ($voyages as $voyage) {
        ?>
            <div class="card m-1" style="width: 18rem;">
                <img src="<?= $voyage->image ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $voyage->description ?></h5>
                    <!-- buttons -->

                    <!-- EDIT BTN -->
                    <?php if (!empty($_GET['edit']) && $_GET['edit'] == 'on') { ?>
                        <div class="container">
                            <div class="row col-6">
                                <h6>Edit <?= $velo->modele; ?> Voyage</h6>
                                <form action="index.php?controller=voyage&task=update" method="POST">

                                    <!-- id -->
                                    <input type="hidden" name="velo_id" value="<?= $velo->id; ?>">
                                    <input type="hidden" name="id" value="<?= $voyage->id; ?>">

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">Voyage Title</label>
                                        <!-- description -->
                                        <textarea name="description" type="text" class="form-control" rows="1" id="exampleInputText1" aria-describedby="emailHelp"><?= $voyage->description; ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPrice2" class="form-label">Image URL</label>
                                        <!-- image -->
                                        <textarea class="form-control" name="image" id="exampleInputPrice2" cols="30" rows="2"><?= $voyage->image; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    <?php } else { ?>
                        <a href="index.php?controller=velo&task=show&id=<?= $velo->id; ?>&edit=on" class=" btn btn-warning mb-3 ms-3 ">Edit Voyage</a>
                    <?php } ?>

                    <!-- Delete BTN -->
                    <a href=" index.php?controller=voyage&task=suppr&id=<?= $voyage->id; ?>" class="btn btn-danger mb-3 ms-3 ">Delete Voyage</a>

                </div>
            </div>
        <?php } ?>
    </div>
</div>