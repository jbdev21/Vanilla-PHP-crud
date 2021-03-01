<?php
    include_once "../includes/functions/helper.php";
    include_once "../includes/database/connection.php";
    checkAuth();

    $id = $_GET['id'];
    $query = $conn->prepare("SELECT * FROM categories WHERE  id = ? LIMIT 1");
    $query->execute([$id]);
    if($query->rowCount()){
        $category = $query->fetch();
    }else{
//        abort(404);
    }

    $pageTitle = "Category Edit";    
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
                            <div class="card-header"> Edit Category</div>
                            <div class="card-body">
                                <form action="/category/update.php" method="POST">
                                    <input type="hidden" value="<?= $category['id']?>" name="id">
                                    <p>
                                        <label for="">Category Name</label>
                                        <input type="text" value="<?=$category['name']?>" name="name" required class="form-control">
                                    </p>
                                    <p>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="/category/index.php" class="btn btn-secondary">Cancel</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
<?php include "../includes/layouts/footer.php";?>
