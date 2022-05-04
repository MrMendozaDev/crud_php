<?php

    include_once('class\Login.php');

    if ($_POST["action"] == "register_user") {
        $data = $_POST["data"];
        $response = LoginClass::new_user($data);
        echo json_encode($response);
    }

    if ($_POST["action"] == "update_password") {
        $data = $_POST["data"];
        $response = LoginClass::update_password($data);
        echo json_encode($response);
    }

    if ($_POST["action"] == "login_user") {
        $data = $_POST["data"];
        $response = LoginClass::login_user($data);
        echo json_encode($response);
    }

    if ($_POST["action"] == "delete_account") {
        $data = $_POST["data"];
        $response = LoginClass::delete_account($data);
        echo json_encode($response);
    }

?>