<?php

session_start();

//editProfile

if (isset ($_SESSION["email"])) {
    $email = $_SESSION["email"];

    if (isset ($_POST["name"])) {
        $name = $_POST["name"];
    }
    if (isset ($_POST["email"])) {
        $newEmail = $_POST["email"];
    }
    if (isset ($_POST["password"])) {
        $password = $_POST["password"];
    }
    if (isset ($_POST["company"])) {
        $company = $_POST["company"];
    }

    include 'db_connect.php';


    $query = "update Employer set name=\"$name\", email= \"$newEmail\", password = \"$password\", company= \"$company\"  where email=\"$email\"";


    if ($connection->query($query) === TRUE) {
         $json['success']= "Record updated successfully";

        echo json_encode($json);
    }else {
        $json['failed']= "Error updating record: " . $connection->error;
        echo json_encode($json); 
    }
}

    else if (isset ($_SESSION["uniemail"])) {
        $uniemail = $_SESSION["uniemail"];

        if (isset ($_POST["name"])) {
            $name = $_POST["name"];
        }

        if (isset ($_POST["uniemail"])) {
            $newEmail = $_POST["uniemail"];
        }
        if (isset ($_POST["password"])) {
            $password= $_POST["password"];
        }

        include 'db_connect.php';


        $query = "update Student set name=\"$name\", uniEmail= \"$newEmail\", password = \"$password\"  where uniEmail=\"$uniemail\"";

        if ($connection->query($query) === TRUE) {
            $json['success']= "Record updated successfully";

            echo json_encode($json);
        }else {
            $json['failed']= "Error updating record: " . $connection->error;
            echo json_encode($json);
        }


    }
$connection->close();
?>

