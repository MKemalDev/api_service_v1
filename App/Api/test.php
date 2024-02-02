<?php
use App\DAL\Models\CategoryModel;
use App\DAL\Models\SubCategoryModel;

require_once __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../DAL/connection.php';

try {

    $categoryModel = new CategoryModel();
    $categoryModel->__set('title', 'test');
    $categoryModel->__set('seo_slug_url', 'test');
    $categoryModel->__set('status', 1);


    $subCategoryModel = new SubCategoryModel();

    $subCategoryModel->__set('title', 'test');
    $subCategoryModel->__set('seo_slug_url', 'test');
    $subCategoryModel->__set('status', 1);
    $subCategoryModel->__set('category', $categoryModel);

    $categoryModel->__get('subCategories')->add($subCategoryModel);

    $entityManager->persist($categoryModel);
    $entityManager->flush();
} catch (\Exception $e) {
    echo $e->getMessage();
}

