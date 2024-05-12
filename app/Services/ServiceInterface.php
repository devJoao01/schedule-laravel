<?php

namespace App\Services;

interface ServiceInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function find(int $id);

    public function all();
}
