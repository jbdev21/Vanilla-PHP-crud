<?php
    require_once  "../includes/functions/helper.php";
    require "../includes/database/connection.php";
    checkAuth();

    // Query for getting all category for selection
    $categoriesQuery = $conn->query("SELECT * FROM categories");
    $locationsQuery = $conn->query("SELECT * FROM locations");

    $id = $_GET['id'];
    $query = $conn->prepare("SELECT * FROM materials WHERE  id = ? LIMIT 1");
    $query->execute([$id]);
    if($query->rowCount()){
        $material = $query->fetch();
    }else{
        // abort(404);
    }

    $pageTitle = "Edit Material";
?>


<?php include "../includes/layouts/header.php";?>
<?php include "../includes/layouts/top-menu.php";?>
<?php include "../includes/layouts/side-menu.php";?>
        <main>
            <div class="container-fluid">
                <h1 class="mt-2">Edit Materials</h1>
                <div class="row">
                    <div class="col-sm-5">
                        <?php include "../includes/errors/flash_message.php" ?>
                        <form action="/material/update.php" method="POST" >
                            <input type="hidden" value="<?= $material['id']?>" name="id">
                            <p>
                                Barcode *
                                <input type="text" name="barcode" required value="<?= $material['barcode'] ?>" class="form-control">
                            </p>
                            <p>
                                Name *
                                <input type="text" name="name" required value="<?= $material['barcode'] ?>" class="form-control">
                            </p>
                            <p>
                                Price *
                                <input type="text" name="price" required value="<?= $material['price'] ?>" class="form-control">
                            </p>
                            <p>
                                Stocks *
                                <input type="number" name="stocks" required value="<?= $material['stocks'] ?>" class="form-control">
                            </p>
                            <p>
                                Category *
                                <select name="category_id" required class="form-control">
                                    <option value=""> - Select -</option>
                                    <?php foreach($categoriesQuery->fetchAll() as $category): ?>
                                        <option <?= $category['id'] == $material['category_id'] ? "selected" : "" ?> value="<?= $category['id']?>"><?= $category['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </p>
                            <p>
                                Location *
                                <select name="location_id" required class="form-control">
                                    <option value=""> - Select -</option>
                                    <?php foreach($locationsQuery->fetchAll() as $location): ?>
                                        <option <?= $location['id'] == $material["location_id"] ? "selected" : "" ?> value="<?= $location['id']?>"><?= $location['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </p>
                            <p>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" <?= $material["is_active"] ? 'checked' : "" ?> name='is_active' id="rememberPasswordCheck" type="checkbox" />
                                        <label class="custom-control-label" for="rememberPasswordCheck">Active</label>
                                    </div>
                                </div>
                            </p>
                            <p>
                                Description
                                <textarea name="description" rows="3" class="form-control"><?= $material['description']?></textarea>
                            </p>
                            <p>
                                <button class="btn btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                                <a class="btn btn-secondary" href="/material/index.php"><i class="fas fa-ban"></i> Cancel</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </main>
<?php include "../includes/layouts/footer.php";?>
