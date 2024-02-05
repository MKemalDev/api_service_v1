<?php

namespace App\BLL\Service;

use App\BLL\Controller\CategoryController;
use Doctrine\ORM\EntityManagerInterface;

class CategoryService
{

    private $controller;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->controller = new CategoryController($entityManager);
    }

    public function getAllValues()
    {

    }
}