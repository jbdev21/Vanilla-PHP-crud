<?php
require_once  "../includes/database/connection.php";
$id = json_decode(file_get_contents('php://input'), true)['id'];

if($id){
    try {
        $query = $conn->prepare("DELETE FROM materials WHERE id = ?");
        if($query->execute([$id])){
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
        http_response_code(403);
        echo json_encode([
            'status' => 403,
            'message' => $e->getMessage()
        ]);
    }
}else{
    http_response_code(403);
    echo json_encode([
        'status' => 403,
        'message' => "No id found"
    ]);
}