<?php

namespace App\Services;

use App\Models\WaitingList;

class WaitingListService implements ServiceInterface
{
    public function create(array $data)
    {
        return WaitingList::create($data);
    }

    public function update(int $id, array $data)
    {
        $WaitingList = WaitingList::findOrFail($id);
        $WaitingList->update($data);
        return $WaitingList;
    }

    public function delete(int $id)
    {
        $WaitingList = WaitingList::findOrFail($id);
        $WaitingList->delete();
    }

    public function find(int $id)
    {
        return WaitingList::findOrFail($id);
    }

    public function all()
    {
        return WaitingList::all();
    }
}
