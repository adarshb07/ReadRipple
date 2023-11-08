<?php
    session_start();

    if(isset($_SESSION['userType']) && $_SESSION['userType'] == admin){

    }
    else{
        header("Location: ../user/");
    }
