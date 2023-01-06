<?php

    function getAllPostcode($connect){
        $resultArray = array();
        $sql = "SELECT state FROM postcode;";
        $result = mysqli_query($connect, $sql);

        while($fetchedrow = mysqli_fetch_assoc($result)){
            $resultArray[] = $fetchedrow;
        }

        echo json_encode($resultArray, JSON_PRETTY_PRINT);
    }

    function getSinglePostcode($connect, $postcode){
        $resultArray = array();
        $sql = "SELECT state FROM postcode WHERE postcode = ? LIMIT 1;";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $sql)){

            echo "Error getting postcode";

        } else {
            mysqli_stmt_bind_param($stmt, "s", $postcode);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

                while($fetchedrow = mysqli_fetch_assoc($result)){

                    $resultArray[] = $fetchedrow;

                }

            
        }

        mysqli_stmt_close($stmt);
        echo json_encode($resultArray, JSON_PRETTY_PRINT);

    }

?>