<?php 

    include('../../include/functions.php');
    include('../../include/connectdb.php');
    header("Content-Type:application/json");

    $postcode = 30000;
    getAllPostcode($connect);

?>