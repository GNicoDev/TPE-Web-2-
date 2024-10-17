<?php
    function sessionAuthMiddleware($res) {
        session_start();
        //echo "$res->user";
        if(isset($_SESSION['ID_USER'])){
            $res->user = new stdClass();
            $res->user->id = $_SESSION['ID_USER'];
            $res->user->email = $_SESSION['EMAIL_USER'];
            return;
        }

    }
?>