<?php
    include_once "../includes/functions/helper.php";
    include_once "../includes/database/connection.php";
    checkAuth();

    $id = $_GET['id'];
    $query = $conn->prepare("SELECT * FROM locations WHERE  id = ? LIMIT 1");
    $query->execute([$id]);
    if($query->rowCount()){
        $location = $query->fetch();
    }else{
//        abort(404);
    }

    $pageTitle = "Edit Location";    
?>

<?php include "../includes/layouts/header.php";?>
<?php include "../includes/layouts/top-menu.php";?>
<?php include "../includes/layouts/side-menu.php";?>
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Location</h1>
                <?php include "../includes/errors/flash_message.php" ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header"> Edit Location</div>
                            <div class="card-body">
                                <form action="/location/update.php" method="POST">
                                    <input type="hidden" value="<?= $location['id']?>" name="id">
                                    <p>
                                        <label for="">Location Name</label>
                                        <input type="text" value="<?=$location['name']?>" name="name" required class="form-control">
                                    </p>
                                    <p>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="/location/index.php" class="btn btn-secondary">Cancel</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
<?php include "../includes/layouts/footer.php";?>
