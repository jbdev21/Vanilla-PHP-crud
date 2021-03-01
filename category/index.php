<?php
    include_once "../includes/functions/helper.php";
    include_once "../includes/database/connection.php";
    checkAuth();

    $query = $conn->prepare("SELECT * FROM categories ORDER BY created_at DESC");
    $query->execute();

    $pageTitle = "Categories";    
?>

<?php include "../includes/layouts/header.php";?>
<?php include "../includes/layouts/top-menu.php";?>
<?php include "../includes/layouts/side-menu.php";?>
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Category</h1>
                <?php include "../includes/errors/flash_message.php" ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header"> Add Category</div>
                            <div class="card-body">
                                <form action="/category/store.php" method="POST">
                                    <p>
                                        <label for="">Category Name</label>
                                        <input type="text" value="<?=old('name')?>" name="name" required class="form-control">
                                    </p>
                                    <p>
                                        <button type="submit" class="btn btn-primary">Save Category</button>
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
                                    <?php foreach($query->fetchAll() as $category): ?>
                                        <tr>
                                            <td><?= $category['name'] ?></td>
                                            <td class="text-right">
                                                <a href="/category/edit.php?id=<?=$category['id']?>" class="btn btn-sm btn-primary w-25">Edit</a>
                                                <a href="#" onclick="if(confirm('Are you sure to delete this category?')){ $('#form-<?=$category['id']?>').submit(); return false; }" class="btn btn-sm btn-danger w-25">Danger</a>
                                                <form id="form-<?=$category['id']?>" action="/category/delete.php" method="POST">
                                                    <input type="hidden" value="<?=$category['id']?>" name="id">
                                                </form>
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
