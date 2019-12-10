<?php

    session_start();

    include 'classes/employe.class.php';

    if(isset($_SESSION['name'])!="") {
        header("Location: dashboard.php");
    }
        if(!empty($_POST)) {
            $employe = new employer;
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $hash = password_hash($mdp, PASSWORD_DEFAULT);
            $auth = $employe->login($email,$hash);
        if($auth === false)
        {
            $auth_error = 'Incorrect Email or Password!!!';
        } else {
            session_start();
            $_SESSION['name'] = $auth['name'];
            $_SESSION['email'] = $auth['email'];
            header("Location: dashboard.php");
        }
        }
    error:
    include 'login.phtml';