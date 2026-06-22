<?php
namespace App\Controllers;
use Core\Controller;
use Core\Middleware;
use App\Models\Vehicle;

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

        $data = [
            'make' => htmlspecialchars(trim($_POST['make'] ?? '')),
            'model' => htmlspecialchars(trim($_POST['model'] ?? '')),
            'year' => (int)($_POST['year'] ?? 0),
            'colour' => htmlspecialchars(trim($_POST['colour'] ?? '')),
            'registration' => htmlspecialchars(trim($_POST['registration'] ?? ''))
        ];

        $vehicle = new Vehicle();
        $vehicle->create($data);
        header('Location:' . \Config\App::url('/vehicles'));
        exit;
    }

    public function delete() {
        Middleware::admin();
        $id = (int)$_POST['id'];
        $vehicle = new Vehicle();
        $vehicle->delete($id);
        header('Location: '. \Config\App::url('/vehicles'));
    }

    public function edit() {
        Middleware::auth();
        $vehicle = new Vehicle();
        $data = $vehicle->find((int)$_GET['id']);
        $this->view('vehicles/edit', ['vehicle'=>$data]);
    }

    public function update() {
        Middleware::auth();
        $vehicle = new Vehicle();
        
        $data = [
        'make'=>htmlspecialchars(trim($_POST['make'])),
        'model'=>htmlspecialchars(trim($_POST['model'])),
        'year'=>(int)$_POST['year'],
        'colour'=>htmlspecialchars(trim($_POST['colour'])),
        'registration'=>htmlspecialchars(trim($_POST['registration']))
        ];

        $vehicle->update((int)$_POST['id'], $data);
        header('Location:' . \Config\App::url('/vehicles'));
        exit;
    }
}