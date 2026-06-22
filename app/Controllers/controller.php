<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\User;

class AuthController extends Controller {
    public function login() {
        $this->view('auth/login');
    }
    
    public function authenticate() {
        $userModel = new User();
        $user = $userModel->findByUsername($_POST['username']);
        if($user && password_verify($_POST['password'], $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user']=$user;
            header("Location: /dashboard");
            exit;
        }
        echo "Invalid login";
    }
}
?>