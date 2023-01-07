<?php 

    include('../../include/functions.php');
    include('../../include/connectdb.php');
    //header("Content-Type:application/json");
    header('Access-Control-Allow-Method: POST');

    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if($requestMethod == "POST"){
        $input = json_decode(file_get_contents("php://input"), true);
        if(empty($input)){
            //Get from form
          /*  echo $_POST['name'];
            echo $_POST['dob'];
            echo $_POST['address'];
            echo $_POST['postCodeId'];
            echo $_POST['state']; */
            createCustomer($connect, $_POST);


        } else {
            createCustomer($connect, $input);
            //Input through POSTMAN etc. using raw JSON data
        }
        

    } else {
        $data = [
            'status'=>405,
            'message'=> $requestMethod.' method not allowed'
        ];
        header('HTTP/1.0 405 Method Not Allowed');
        echo json_encode($data);
    }

?>