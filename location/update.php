<?php
include_once  "../includes/database/connection.php";
include_once  "../includes/functions/helper.php";
checkAuth();

if(isset($_POST['name'] ) && isset($_POST['id'])){
    $id     = filter_var($_POST['id'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string
    $name   = filter_var($_POST['name'], FILTER_SANITIZE_STRING); //remove all HTML tags from a string

    /*
     * NOTE
         * checking for existing name
           where id is not the same of this $id
    */
    if(checkForDuplication('categories', $name, $conn, $id)){
        setOldInputs();
        return redirect( 'category/edit.php?id=' . $id ,[
            'type' => "danger",
            'message' => "Category $name is already existing!"
        ]);
    }

    $query = $conn->prepare("UPDATE categories SET name = ? WHERE id = ?");
    if($query->execute([$name, $id])){
        clearOldInputs();
        $message = [
            'type' => "success",
            'message' => "Category updated!"
        ];
        return redirect('category/index.php',$message); // this is from helper.php
    }else{
        setOldInputs();
        $message = [
            'type' => "danger",
            'message' => "Category not save!"
        ];
        return redirect('category/edit.php?id=' . $id,$message); // this is from helper.php
    }

}

