<?php
    function verifyAuthMiddleware($res) {
       // echo 'entro'; 
       //var_dump($res)  ;
        if($res->user) {
            return;
        } else {
            header('Location: ' . BASE_URL . 'sign-in');
            die();
        }
    }
?>