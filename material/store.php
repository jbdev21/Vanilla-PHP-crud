<?php
include_once  "../includes/database/connection.php";
include_once  "../includes/functions/helper.php";
checkAuth();

if(isset($_POST['name'])){
    $barcode            = filter_var($_POST['barcode'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string
    $name               = filter_var($_POST['name'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string
    $price              = filter_var($_POST['price'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string
    $stocks             = filter_var($_POST['stocks'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string
    $category_id        = filter_var($_POST['category_id'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string
    $location_id        = filter_var($_POST['location_id'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string
    $description        = filter_var($_POST['description'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string
    $is_active          = isset($_POST['is_active']) ? 1 : 0; //remove all HTML tags from a string

    if(checkForMaterialDuplication($name, $category_id, $location_id, $conn)){
        setOldInputs();
        return redirect('material/create.php',[
            'type' => "danger",
            'message' => "Material $name with category you choose is already existing!"
        ]); // this is from helper.php
    }

    if(checkUniqueInColumn("materials", "barcode", $barcode, $conn)){
        setOldInputs();
        return redirect('material/create.php',[
            'type' => "danger",
            'message' => "Material's barcode of $barcode is is already existing!"
        ]); // this is from helper.php
    }

    $query = $conn->prepare("INSERT INTO materials (barcode, name, price, description, is_active, stocks, category_id, location_id ) 
                VALUE (?, ?, ?, ?, ?, ?, ?, ?)");
    if($query->execute([$barcode, $name, $price, $description, $is_active, $stocks, $category_id, $location_id])){
        clearOldInputs();
        $message = [
            'type' => "success",
            'message' => "Material stored succesfully"
        ];
    }else{
        setOldInputs();
        $message = [
            'type' => "danger",
            'message' => "Material not save!"
        ];
    }

    return redirect('material/index.php', $message); // this is from helper.php
}

