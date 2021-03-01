<?php
require_once  "../includes/database/connection.php";
require_once  "../includes/functions/helper.php";

$id = json_decode(file_get_contents('php://input'), true)['id'];
if($id){
    try {
        $query = $conn->query("DELETE FROM locations WHERE id = $id");
        if($query){
            $errorCode = 200;
            $message = "Delete Success!";
        }else{
            $errorCode = 403;
            $message = "Delete failed!";
        }

        // sending response
        http_response_code($errorCode);
        echo json_encode([
            'status' => $errorCode,
            'message' => $message,
        ]);

    }catch (Exception $e){
           if($e->getCode() == 23000){
                $message = "You cannot delete this category because it is been assiciated to material";
            }else{
                $message = $e->getMessage();
            }
           http_response_code(403);
            echo json_encode([
                'status' => 403,
                'message' => $message
            ]);
    }

}else{
    http_response_code(403);
    echo json_encode([
        'status' => 403,
        'message' => "No id found"
    ]);
}