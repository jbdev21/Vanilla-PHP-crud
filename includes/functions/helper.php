<?php
session_start();

if(!function_exists("checkAuth")){
    function checkAuth(){
        if(!isset($_SESSION['logged_user'])){
            return redirect('');
        }
    }
}

if(!function_exists("redirectIfLoggedIn")){
    function redirectIfLoggedIn(){
        if(isset($_SESSION['logged_user'])){
            return redirect('material');
        }
    }
}


if(!function_exists("loggedUser")){
    function loggedUser(){
        return $_SESSION['logged_user'];
    }
}
// redirect function with flash screen 😁
if(!function_exists('redirect')){
    function redirect($page, $message = []){
        if(!empty($message)){
            $_SESSION['flash_message'] = $message;
        }
        header("Location: /$page");
    }
}


if(!function_exists('checkForDuplication')){
    function checkForDuplication($table, $name, $conn, $id = null) {
        if($id){
            $duplicate = $conn->prepare("SELECT * FROM $table WHERE name = ? AND id != ? LIMIT 1");
            $duplicate->execute([$name, $id]);
        }else{
            $duplicate = $conn->prepare("SELECT * FROM $table WHERE name = ? LIMIT 1");
            $duplicate->execute([$name]);
        }

        if($duplicate->rowCount()){
            return true;
        }
        return false;
    }
}

if(!function_exists('checkForMaterialDuplication')){
    function checkForMaterialDuplication($name, $category_id, $location_id, $conn, $id = null) {
        if($id){
            $duplicate = $conn->prepare("SELECT * FROM materials WHERE name = ? AND category_id = ? AND location_id = ? AND id != ? LIMIT 1");
            $duplicate->execute([$name, $category_id, $location_id, $id]);
        }else{
            $duplicate = $conn->prepare("SELECT * FROM materials WHERE name = ? AND category_id = ? AND location_id = ? LIMIT 1");
            $duplicate->execute([$name, $category_id, $location_id]);
        }

        if($duplicate->rowCount()){
            return true;
        }
        return false;
    }
}

if(!function_exists("checkUniqueInColumn")){
    function checkUniqueInColumn($table, $column, $value, $conn, $id = null){
        if($id){
            $query = $conn->prepare("SELECT * FROM $table WHERE $column = ? AND id != ? LIMIT 1");
            $query->execute([$value, $id]);
        }else{
            $query = $conn->prepare("SELECT * FROM $table WHERE $column = ?");
            $query->execute([$value]);
        }

        if($query->rowCount()){
            return true;
        }
        return false;
    }
}

// Getting inputed value in prev. submit
if(!function_exists('old')){
    function old($key){
        if( isset($_SESSION['old_inputs'][$key])){
            $value =  $_SESSION['old_inputs'][$key];
            unset($_SESSION['old_inputs'][$key]);
            return $value;
        }
        return '';
    }
}

// Setting Old inputs after submit of form or ajax
if(!function_exists('setOldInputs')){
    function setOldInputs(){
        $_SESSION['old_inputs'] = $_REQUEST;
    }
}

// Clearing Old inputs after submit of form or ajax
if(!function_exists('clearOldInputs')){
    function clearOldInputs(){
        unset($_SESSION['old_inputs']);
    }
}
