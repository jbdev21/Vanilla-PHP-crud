<?php
    require_once  "../includes/functions/helper.php";
    require "../includes/database/connection.php";
    checkAuth();

    $statement = "SELECT *, materials.name AS name, materials.id AS id, categories.name AS category, locations.name AS location FROM materials 
    LEFT JOIN categories ON materials.category_id = categories.id 
    LEFT JOIN locations ON materials.location_id = locations.id ";

    if(!empty($_GET['q'])){
        $statement .= " WHERE materials.barcode LIKE '%" . $_GET['q']. "%'
                        OR materials.name LIKE '%" . $_GET['q'] . "%'  
                          OR categories.name LIKE '%" . $_GET['q'] . "%' 
                          OR locations.name LIKE '%" . $_GET['q'] . "%' ";
    }

    if(!empty($_GET['category'])){
        $statement .= " AND materials.category_id = " . $_GET['category'];
    }

    if(!empty($_GET['location'])){
        $statement .= " AND materials.location_id = " . $_GET['location'];
    }


    if(isset($_GET['is_active'])){
        if($_GET['is_active'] != 2){
            $statement .= " AND materials.is_active = " . $_GET['is_active'];
        }
    }

    $statement .= " ORDER BY materials.created_at DESC";

    // Query for getting all materials
    $materialQuery = $conn->prepare($statement);
    $materialQuery->execute();

    // Query for getting all category for selection
    $categoriesQuery = $conn->query("SELECT * FROM categories");
    $locationsQuery = $conn->query("SELECT * FROM locations");

    $pageTitle = "Material";    
?>


<?php include "../includes/layouts/header.php";?>
<?php include "../includes/layouts/top-menu.php";?>
<?php include "../includes/layouts/side-menu.php";?>
        <main>
            <div class="container-fluid">
                <h1 class="mt-2">Materials</h1>
                <?php include "../includes/errors/flash_message.php" ?>
                <form id="filter-form">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="input-group ">
                                <input type="search" name="q" value="<?= $_GET['q'] ?? ''  ?>" class="form-control" placeholder="Search by Barcode, Name or Category Name" >
                                  <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary" type="button">Search</button>
                                  </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <select data-buttons="filter" name="category" id="" class="form-control">
                                <option value="">All Categories</option>
                                <?php foreach($categoriesQuery->fetchAll() as $category): ?>
                                    <option <?= $category['id'] == ($_GET['category'] ?? "") ? "selected" : "" ?> value="<?= $category['id']?>"><?= $category['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select data-buttons="filter" name="location" id="" class="form-control">
                                <option value="">All Location</option>
                                <?php foreach($locationsQuery->fetchAll() as $location): ?>
                                    <option <?= $location['id'] == ($_GET['location'] ?? "") ? "selected" : "" ?> value="<?= $location['id']?>"><?= $location['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select data-buttons="filter" name="is_active" id="" class="form-control">
                                <option value="2">All Status</option>
                                <option <?= ($_GET['is_active'] ?? "") == 1 ? "selected" : "" ?> value="1">Active</option>
                                <option <?= ($_GET['is_active'] ?? "") == 0 ? "selected" : "" ?> value="0">Not Active</option>
                            </select>
                        </div>
                        <div class="col-sm-2 text-right">
                            <a href="/material/print.php?<?= $_SERVER['QUERY_STRING']?>" target="_blank" class="btn btn-secondary"> Print</a>
                            <a href="/material/create.php" class="btn btn-primary"> Add New</a>
                        </div>
                    </div>
                </form>
                
                <div class="table-responsive">
                      <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Stocks</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($materialQuery->fetchAll() as $material): ?>
                                    <tr id="tr-<?=$material['id']?>">
                                        <td><?= $material['barcode'] ?></td>
                                        <td><?= $material['name'] ?></td>
                                        <td>&#8369;<?= number_format($material['price'], 2) ?></td>
                                        <td><?= $material['description'] ?></td>
                                        <td><?= $material['stocks'] ?></td>
                                        <td><?= $material['category'] ?></td>
                                        <td><?= $material['location'] ?></td>
                                        <td><?= $material['is_active'] ? "Yes" : "No" ?></td>
                                        <td>
                                            <a href="/material/edit.php?id=<?=$material['id']?>" class="btn btn-sm btn-primary btn-block">Edit</a>
                                             <button type="button"
                                                   data-buttons="delete"
                                                   data-id="<?=$material['id']?>"
                                                   data-div="#tr-<?=$material['id']?>"
                                                   data-uri="/material/delete.php"
                                                   class="btn btn-block btn-danger">Danger</button>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                      </table>
                </div>

            </div>
        </main>
<?php include "../includes/layouts/footer.php";?>
