<?php
use App\DAL\Models\CategoryModel;

require_once __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../DAL/connection.php';

try {

    $categoryModel = new CategoryModel();
    $categoryModel->__set('title', 'test');
    $categoryModel->__set('seo_slug_url', 'test');

    $entityManager->persist($categoryModel);
    $entityManager->flush();
} catch (\Exception $e) {
    echo $e->getMessage();
}
echo 'ok';
