<?php
session_start();
require  "../includes/database/connection.php";

if(isset($_POST['email']) || isset($_POST['password'])){
    $errorCode = 0;
    $message = '';
    $redirectUrl = '';
    $data = [];

    try {
        $query = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1");
        $query->execute([$_POST['email'], md5($_POST['password'])]);

        if($query->rowCount()){
            $data = $query->fetch();
            $_SESSION['logged_user'] = $data;
            $errorCode = 200;
            $message = "Login Success";
            $redirectUrl = '/material';
        }else{
            $message = "No account Found!";
            $redirectUrl = '';
            $errorCode = 403;
        }
    }catch (\Exception $e){
        $message = $e->getMessage();
        $errorCode = 500;
    }

    // sending response
    http_response_code($errorCode);
    echo json_encode([
        'message' => $message,
        'data' => $data,
        'redirect_url' => $redirectUrl
    ]);

}else{
    $response = [
        'status' => 403,
        'message' => 'Please provide your username and password'
    ];

    http_response_code(403);
    echo json_encode($response);
}

