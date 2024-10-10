<?php
include_once 'app/views/home.view.php';

class HomeController {

    private $homeView;

    function __construct()
    {
        $this->homeView = new HomeView();
    }

    function showHome(){
        return $this->homeView->showHome();
    }
}