<?php

namespace App\Services;

use App\Models\UserSystem;

class UserSystemService implements ServiceInterface
{
    public function create(array $data)
    {
        return UserSystem::create($data);
    }

    public function update(int $id, array $data)
    {
        $UserSystem = UserSystem::findOrFail($id);
        $UserSystem->update($data);
        return $UserSystem;
    }

    public function delete(int $id)
    {
        $UserSystem = UserSystem::findOrFail($id);
        $UserSystem->delete();
    }

    public function find(int $id)
    {
        return UserSystem::findOrFail($id);
    }

    public function all()
    {
        return UserSystem::all();
    }
}
