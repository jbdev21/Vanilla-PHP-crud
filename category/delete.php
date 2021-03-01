<?php
require_once  "../includes/functions/helper.php";
require_once  "../includes/database/connection.php";
checkAuth();
if(isset($_POST['id'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
    try {
        $query = $conn->query("DELETE FROM categories WHERE id = $id");
        if($query){
            return redirect('category/index.php', [
                'type' => "success",
                'message' => 'Category deleted!'
            ]);
        }else{
            return redirect('category/index.php', [
                'type' => "danger",
                'message' => 'Category deletion failed!'
            ]);
        }
    }catch (Exception $e){
            if($e->getCode() == 23000){
                $message = "You cannot delete this category because it is been assiciated to material";
            }else{
                $message = $e->getMessage();
            }
          return redirect('category/index.php', [
                'type' => "danger",
                'message' => $message
            ]);
    }

}