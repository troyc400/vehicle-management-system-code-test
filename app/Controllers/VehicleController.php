<?php
namespace App\Controllers;
use Core\Controller;
use Core\Middleware;
use App\Models\Vehicle;
use Core\Session;
use Core\Csrf;

class VehicleController extends Controller {
    public function index() {
        Middleware::auth();
        $vehicle = new Vehicle();
        $this->view('vehicles/index', ['vehicles'=>$vehicle->all()]);
    }

    public function create() {
        Middleware::auth();
        $this->view('vehicles/create');
    }

    public function store() {
        Middleware::auth();

        if(!Csrf::verify($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF Token');
        }

        $data = [
            'make' => htmlspecialchars(trim($_POST['make'] ?? '')),
            'model' => htmlspecialchars(trim($_POST['model'] ?? '')),
            'year' => (int)($_POST['year'] ?? 0),
            'colour' => htmlspecialchars(trim($_POST['colour'] ?? '')),
            'registration' => htmlspecialchars(trim($_POST['registration'] ?? ''))
        ];

        $vehicle = new Vehicle();

        try {
            $vehicle->create($data);
            Session::flash('success', 'Vehicle created successfully');
            header('Location: ' . \Config\App::url('/vehicles'));
            exit;
        } 
        catch (\PDOException $e) {
            $_SESSION['old'] = $data;
            if ($e->getCode() == 23000) {
                Session::flash('error', 'A vehicle with this registration number already exists');
            } else {
                Session::flash('error', 'An unexpected error occurred while saving the vehicle');
            }
            header('Location: ' . \Config\App::url('/vehicles/create'));
            exit;
        }
    }

    public function delete() {
        Middleware::admin();
        if(!Csrf::verify($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF Token');
        }
        $id = (int)$_POST['id'];
        $vehicle = new Vehicle();
        $vehicle->delete($id);
        Session::flash('success', 'Vehicle deleted successfully');
        header('Location: '. \Config\App::url('/vehicles'));
        exit;
    }

    public function edit() {
        Middleware::auth();
        $vehicle = new Vehicle();
        $data = $vehicle->find((int)$_GET['id']);
        $this->view('vehicles/edit', ['vehicle'=>$data]);
    }

    public function update() {
        Middleware::auth();
        if(!Csrf::verify($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF Token');
        }

        $data = [
            'make' => htmlspecialchars(trim($_POST['make'] ?? '')),
            'model' => htmlspecialchars(trim($_POST['model'] ?? '')),
            'year' => (int)($_POST['year'] ?? 0),
            'colour' => htmlspecialchars(trim($_POST['colour'] ?? '')),
            'registration' => htmlspecialchars(trim($_POST['registration'] ?? ''))
        ];

        $vehicle = new Vehicle();
        try {
            $vehicle->update((int)$_POST['id'], $data);
            Session::flash('success', 'Vehicle updated successfully');
            header('Location: ' . \Config\App::url('/vehicles'));
            exit;
        } 
        catch (\PDOException $e) {
            $_SESSION['old'] = $data;
            $_SESSION['old']['id'] = (int)$_POST['id'];
            if ($e->getCode() == 23000) {
                Session::flash('error', 'A vehicle with this registration number already exists');
            } 
            else {
                Session::flash('error', 'An unexpected error occurred while updating the vehicle');
            }
            header('Location: ' . \Config\App::url('/vehicles/edit?id=' . $_POST['id']));
            exit;
        }
    }
}
?>