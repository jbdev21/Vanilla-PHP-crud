<?php
include_once  "../includes/database/connection.php";
include_once  "../includes/functions/helper.php";
checkAuth();

if(isset($_POST['name'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string
    if(checkForDuplication('categories', $name, $conn)){
        setOldInputs();
        return redirect('category/index.php',[
            'type' => "danger",
            'message' => "Category $name is already existing!"
        ]); // this is from helper.php
    }

    $query = $conn->prepare("INSERT INTO categories (name) VALUE (?)");
    if($query->execute([$name])){
        clearOldInputs();
        $message = [
            'type' => "success",
            'message' => "Category stored succesfully"
        ];
    }else{
        setOldInputs();
        $message = [
            'type' => "danger",
            'message' => "Category not save!"
        ];
    }

    return redirect('category/index.php',$message); // this is from helper.php
}

