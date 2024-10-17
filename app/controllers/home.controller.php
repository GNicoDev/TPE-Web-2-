<?php
include_once 'app/views/home.view.php';

class HomeController {

    private $homeView;
    private $user = null;

    function __construct($res)
    {
        $this->homeView = new HomeView();
        $this->user = $res->user;
    }

    function showHome(){
        return $this->homeView->showHome($this->user);
    }
}