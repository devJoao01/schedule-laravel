<?php

namespace App\Services;

use App\Models\Schedule;

class ScheduleService implements ServiceInterface
{
    public function create(array $data)
    {
        return Schedule::create($data);
    }

    public function update(int $id, array $data)
    {
        $Schedule = Schedule::findOrFail($id);
        $Schedule->update($data);
        return $Schedule;
    }

    public function delete(int $id)
    {
        $Schedule = Schedule::findOrFail($id);
        $Schedule->delete();
    }

    public function find(int $id)
    {
        return Schedule::findOrFail($id);
    }

    public function all()
    {
        return Schedule::all();
    }
}
