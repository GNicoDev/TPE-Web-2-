<?Php
include_once 'app/views/login.view.php';
include_once 'app/models/usurio.model.php';
include_once 'app/views/mensaje.view.php';

class AuthController
{
    private $userModel;
    private $loginView;
    private $mensajeView;
    private $user = null;

    function __construct($res)
    {
        $this->loginView = new LoginView();
        $this->userModel = new Usuario();
        $this->mensajeView = new Mensaje();
        $this->user = $res->user;

    }

    function showSignIn()
    {
        $this->loginView->showLogin($this->user);
    }

    function login()
    {
       // var_dump($_POST);
        $email = $_POST['email'];
        $user = $this->userModel->getUserByEmail($email);
        if ($user) {
            $password  = $_POST['password'];
            if (password_verify($password, $user->password)) {
               
                session_start();
                $_SESSION['ID_USER'] = $user->id;
                $_SESSION['EMAIL_USER'] = $user->email;

                //Redirijo al home
               header('Location: ' . BASE_URL);
            } else
                 $this->mensajeView->showMensaje('Password no coincide', 'error', $this->user) ;
        } else
            $this->mensajeView->showMensaje(' Email inexistente','error',$this->user) ;   
    }

    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }
}