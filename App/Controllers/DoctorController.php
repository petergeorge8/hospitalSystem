<?php

namespace App\Controllers;

use \App\View;
use \App\Model\Doctors\DoctorModel;

class DoctorController
{

    private int $id;
    private string $name;
    private int $spec_id;
    private DoctorModel $doctorModel;
    public function __construct()
    {
        $this->doctorModel = new DoctorModel();
    }
    public function index()
    {

        $doctorsTable = $this->doctorModel->getAllDoctors();
        return View::make("hospital/doctor", ['title' => "Doctors", 'doctors' => $doctorsTable]);
    }
    public function addDoctorView()
    {
        return View::make("hospital/addDoctor", ['title' => "Doctors"]);
    }
    public function addDoctorOperation()
    {
        $doctorName = $_POST['doctorName'];
        $specId = (int) $_POST['specId'];
        $doctorId = $this->doctorModel->addNewDoctor($doctorName, $specId);

        return View::make("hospital/addDoctor", ['title' => "Doctors", 'doctorId' => $doctorId]);
    }
}
