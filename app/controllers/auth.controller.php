<?Php
include 'app/views/login.view.php';

class AuthController
{
    private $userModel;
    private $loginView;
    private $user = null;

    function __construct()
    {
        $this->loginView = new LoginView();
    }

    function showSignIn()
    {
        $this->loginView->showLogin();
    }
}