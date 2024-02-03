<?php

namespace App\BLL\Interfaces;



interface IRepository
{

    public function getById(int $id);
    public function getAll();

    public function delete(int $id);

    public function save($entity);

    public function update($entity);
}