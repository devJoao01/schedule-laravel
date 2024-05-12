<?php

namespace App\Services;

use App\Models\Appointment;

class AppointmentService implements ServiceInterface
{
    public function create(array $data)
    {
        return Appointment::create($data);
    }

    public function update(int $id, array $data)
    {
        $Appointment = Appointment::findOrFail($id);
        $Appointment->update($data);
        return $Appointment;
    }

    public function delete(int $id)
    {
        $Appointment = Appointment::findOrFail($id);
        $Appointment->delete();
    }

    public function find(int $id)
    {
        return Appointment::findOrFail($id);
    }

    public function all()
    {
        return Appointment::all();
    }
}
