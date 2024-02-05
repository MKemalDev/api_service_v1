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

    public function getAllValues(?array $options = ["default" => 0])
    {
        if ($options["default"] == 0) {
            return $this->controller->getAllValuesWithDefault();
        } else if ($options["default"] == 1) {
            return $this->controller->getAllValuesWithSubCategoryAndImage();
        } else if ($options["default"] == 2) {
            return $this->controller->getAllValuesWithSubCategory();
        } else {
            throw new \Exception("Error Processing Request", 1);
        }
    }
}