<?php

namespace App\Services;

use App\Models\Patient;

class PatientService implements ServiceInterface
{
    public function create(array $data)
    {
        return Patient::create($data);
    }

    public function update(int $id, array $data)
    {
        $Patient = Patient::findOrFail($id);
        $Patient->update($data);
        return $Patient;
    }

    public function delete(int $id)
    {
        $Patient = Patient::findOrFail($id);
        $Patient->delete();
    }

    public function find(int $id)
    {
        return Patient::findOrFail($id);
    }

    public function all()
    {
        return Patient::all();
    }
}
