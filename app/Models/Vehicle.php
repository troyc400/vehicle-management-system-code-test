<?php
namespace App\Models;
use Core\Model;

class Vehicle extends Model {

    public function all() {
        $stmt = $this->db->query(
            "SELECT * FROM vehicles ORDER BY id DESC"
        );
        return $stmt->fetchAll();
    }

    public function find(int $id) {
        $stmt = $this->db->prepare(
            "SELECT *
             FROM vehicles
             WHERE id = :id"
        );

        $stmt->execute([
            ':id'=>$id
        ]);
        return $stmt->fetch();
    }

    public function create(array $data) {
        $stmt = $this->db->prepare(

        "INSERT INTO vehicles (
            make,
            model,
            year,
            colour,
            registration_number
        )
        VALUES (
            :make,
            :model,
            :year,
            :colour,
            :registration
        )");

        return $stmt->execute([
            ':make'=>$data['make'],
            ':model'=>$data['model'],
            ':year'=>$data['year'],
            ':colour'=>$data['colour'],
            ':registration'=>$data['registration']
        ]);
    }

    public function update(int $id, array $data) {
        $stmt = $this->db->prepare(
        "UPDATE vehicles SET 
        make=:make,
        model=:model,
        year=:year,
        colour=:colour,
        registration_number=:registration
        WHERE id=:id");

        return $stmt->execute([
            ':make'=>$data['make'],
            ':model'=>$data['model'],
            ':year'=>$data['year'],
            ':colour'=>$data['colour'],
            ':registration'=>$data['registration'],
            ':id'=>$id
        ]);
    }

    public function delete(int $id) {
        $stmt = $this->db->prepare(
        "DELETE FROM vehicles
        WHERE id=:id");

        return $stmt->execute([':id'=>$id]);
    }
}
?>