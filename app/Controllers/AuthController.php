<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\User;

class AuthController extends Controller {
    public function login() {
        $this->view('auth/login');
    }

    public function authenticate() {
        echo "Authentication working";
    }
}
?>