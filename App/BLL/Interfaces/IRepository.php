<?php

namespace App\BLL\Interfaces;



interface IRepository
{

    public function getById(int $id);
    public function getAll(): array;

    public function delete(int $id);

    public function save(array $data);

    public function update(int $id, array $data);
}