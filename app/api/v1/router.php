<?php

use App\Entity\CategoryModel;
use App\Entity\SubCategoryModel;

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