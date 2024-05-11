<?php

namespace App\Services;

use App\Models\Doctor;

class DoctorService implements DoctorServiceInterface
{
    public function create(array $data)
    {
        return Doctor::create($data);
    }

    public function update(int $id, array $data)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->update($data);
        return $doctor;
    }

    public function delete(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
    }

    public function find(int $id)
    {
        return Doctor::findOrFail($id);
    }

    public function all()
    {
        return Doctor::all();
    }
}
