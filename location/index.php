<?php
    include_once "../includes/database/connection.php";
    include_once "../includes/functions/helper.php";
    checkAuth();

    $query = $conn->prepare("SELECT * FROM locations ORDER BY created_at DESC");
    $query->execute();

    $pageTitle = "Locations";    
?>

<?php include "../includes/layouts/header.php";?>
<?php include "../includes/layouts/top-menu.php";?>
<?php include "../includes/layouts/side-menu.php";?>
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Locations</h1>
                <?php include "../includes/errors/flash_message.php" ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header"> Add Location</div>
                            <div class="card-body">
                                <form action="/location/store.php" method="POST">
                                    <p>
                                        <label for="">Locations Name</label>
                                        <input type="text" value="<?=old('name')?>" name="name" required class="form-control">
                                    </p>
                                    <p>
                                        <button type="submit" class="btn btn-primary">Save Location</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($query->fetchAll() as $location): ?>
                                        <tr id="tr-<?=$location['id']?>">
                                            <td><?= $location['name'] ?></td>
                                            <td class="text-right">
                                                <a href="/category/edit.php?id=<?=$location['id']?>" class="btn btn-sm btn-primary w-25">Edit</a>
                                                <button type="button"
                                                   data-buttons="delete"
                                                   data-id="<?=$location['id']?>"
                                                   data-div="#tr-<?=$location['id']?>"
                                                   data-uri="/location/delete.php"
                                                   class="btn btn-sm btn-danger w-25">Danger</button>

                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
<?php include "../includes/layouts/footer.php";?>
