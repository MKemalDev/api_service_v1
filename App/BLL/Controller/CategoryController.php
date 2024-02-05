<?php
namespace App\BLL\Controller;

use App\BLL\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;

class CategoryController
{
    private CategoryRepository $categoryRepository;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->categoryRepository = new CategoryRepository($entityManager);
    }
}