<?php 

    include('../../include/functions.php');
    include('../../include/connectdb.php');
    header("Content-Type:application/json");
    header('Access-Control-Allow-Method: POST');
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if($requestMethod == "GET"){
        $postcode = htmlspecialchars($_GET['postcode']);
        $singleState = getSinglePostcode($connect, $postcode);
        echo $singleState;

    } else {
        $data = [
            'status'=>405,
            'message'=> $requestMethod.' method not allowed'
        ];
        header('HTTP/1.0 405 Method Not Allowed');
        echo json_encode($data);
    }
    

?>