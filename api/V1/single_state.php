<?php 

    include('../../include/functions.php');
    include('../../include/connectdb.php');
    header("Content-Type:application/json");

    //$postcode = 35000;
    $postcode = htmlspecialchars($_GET['postcode']);
    getSinglePostcode($connect, $postcode);

?>