<?php

use App\Dal\Model\CategoryModel;
use App\Dal\Model\SubCategoryModel;

require_once __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../DAL/Connection.php';
$category = new CategoryModel();
$category->__set('title', 'Elektronik');

// Alt Kategori oluşturma
$subCategory = new SubCategoryModel();
$subCategory->__set('title', 'telefon');
$subCategory->__set("category", $category);

// Kategoriye Alt Kategori eklemek
$category->getSubCategories()->add($subCategory);

// Veritabanına kaydetme
$entityManager->persist($category);
$entityManager->flush();