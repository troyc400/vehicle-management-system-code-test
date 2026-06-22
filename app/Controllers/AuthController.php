<?php
namespace App\Controllers;
use Core\Controller;
use Core\Request;
use Core\Session;
use App\Models\User;

class AuthController extends Controller {
    public function login(): void {
        $this->view('auth/login');
    }

    public function authenticate(): void {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $userModel = new User();
        $user = $userModel->findByUsername($username);

        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = 'Invalid credentials';
            header('Location: ' . \Config\App::url('/login'));
            exit;
        }
        Session::login($user);
        header('Location: ' . \Config\App::url('/dashboard'));
        exit;
    }

    public function logout(): void {
        Session::logout();
        header('Location: ' . \Config\App::url('/login'));
        exit;
    }
}
?>