<?php

declare(strict_types=1);

namespace App\Model\Doctors;

use App\Model\Model;

class DoctorModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllDoctors()
    {
        $sql = "SELECT * FROM doctors";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $doctorsTable = $stmt->fetchAll();
        return $doctorsTable;
    }
    public function addNewDoctor(string $name, int $spec_id): int
    {
        $sql = "INSERT INTO doctors (`name`, `spec`) VALUES (:name, :spec_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':spec_id', $spec_id);
        $stmt->execute();

        $doctor_id = $this->db->lastInsertId();

        $updateComingSql = "INSERT INTO doctor_coming (`doctor_id`, `spec_id`) VALUES (:doctor_id, :spec_id)";
        $stmt = $this->db->prepare($updateComingSql);
        $stmt->execute(['doctor_id' => $doctor_id, 'spec_id' => $spec_id]);
        return (int) $doctor_id;
    }
    public function lastInsertId(): int
    {
        return (int) $this->db->lastInsertId();
    }
}
