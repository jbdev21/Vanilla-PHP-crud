<?php
    require_once  "../includes/functions/helper.php";
    require "../includes/database/connection.php";
    checkAuth();

    // Query for getting all category for selection
    $categoriesQuery = $conn->query("SELECT * FROM categories");
    $locationsQuery = $conn->query("SELECT * FROM locations");

    $pageTitle = "Create Material";    
?>


<?php include "../includes/layouts/header.php";?>
<?php include "../includes/layouts/top-menu.php";?>
<?php include "../includes/layouts/side-menu.php";?>
        <main>
            <div class="container-fluid">
                <h1 class="mt-2">Add Materials</h1>
                <div class="row">
                    <div class="col-sm-5">
                        <?php include "../includes/errors/flash_message.php" ?>
                        <form action="/material/store.php" method="POST" >
                            <p>
                                Barcode *
                                <input type="text" name="barcode" required value="<?= old('barcode') ?>" class="form-control">
                            </p>
                            <p>
                                Name *
                                <input type="text" name="name" required value="<?= old('name') ?>" class="form-control">
                            </p>
                            <p>
                                Price *
                                <input type="text" name="price" required value="<?= old('price') ?>" class="form-control">
                            </p>
                            <p>
                                Stocks *
                                <input type="number" name="stocks" required value="<?= old('stocks') ?>" class="form-control">
                            </p>
                            <p>
                                Category *
                                <select name="category_id" required class="form-control">
                                    <option value=""> - Select -</option>
                                    <?php foreach($categoriesQuery->fetchAll() as $category): ?>
                                        <option <?= $category['id'] == (old('category_id') ?? "") ? "selected" : "" ?> value="<?= $category['id']?>"><?= $category['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </p>
                            <p>
                                Location *
                                <select name="location_id" required class="form-control">
                                    <option value=""> - Select -</option>
                                    <?php foreach($locationsQuery->fetchAll() as $location): ?>
                                        <option <?= $location['id'] == (old("location_id") ?? "") ? "selected" : "" ?> value="<?= $location['id']?>"><?= $location['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </p>
                            <p>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" <?= old("is_active") ? 'checked' : "" ?> name='is_active' id="rememberPasswordCheck" type="checkbox" />
                                        <label class="custom-control-label" for="rememberPasswordCheck">Active</label>
                                    </div>
                                </div>
                            </p>
                            <p>
                                Description
                                <textarea name="description" rows="3" class="form-control"></textarea>
                            </p>
                            <p>
                                <button class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                                <a class="btn btn-secondary" href="/material/index.php"><i class="fas fa-ban"></i> Cancel</a>
                            </p>
                        </form>
                    </div>
                </div>
            
           

            </div>
        </main>
<?php include "../includes/layouts/footer.php";?>
