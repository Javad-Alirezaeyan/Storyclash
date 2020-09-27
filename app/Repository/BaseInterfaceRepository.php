<?php

namespace App\Repository;


interface BaseInterfaceRepository
{
    public function all();
    public function paginate($count);
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function delete($id);
    public function findBy(string $field, string $value);
}