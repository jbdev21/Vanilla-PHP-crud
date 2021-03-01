<?php
include_once  "../includes/database/connection.php";
include_once  "../includes/functions/helper.php";
checkAuth();

if(isset($_POST['name'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string

    if(checkForDuplication('locations', $name, $conn)){
        setOldInputs();
        return redirect('location/index.php',[
            'type' => "danger",
            'message' => "Location $name is already existing!"
        ]); // this is from helper.php
    }

    $query = $conn->prepare("INSERT INTO locations (name) VALUE (?)");
    if($query->execute([$name])){
        clearOldInputs();
        $message = [
            'type' => "success",
            'message' => "Location stored succesfully"
        ];
    }else{
        setOldInputs();
        $message = [
            'type' => "danger",
            'message' => "Location not save!"
        ];
    }

    return redirect('location/index.php',$message); // this is from helper.php
}

