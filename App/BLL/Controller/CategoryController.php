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

    public function getAllValuesWithDefault()
    {
        return $this->categoryRepository->getAll();
    }

    public function getAllValuesWithSubCategoryAndImage()
    {
        return $this->categoryRepository->getAllWithImageAndSubCategory();
    }

    public function getAllValuesWithSubCategory()
    {
        return $this->categoryRepository->getAllWithSubCategory();
    }
}