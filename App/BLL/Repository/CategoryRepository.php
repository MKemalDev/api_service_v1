<?php


namespace App\BLL\Repository;

use App\BLL\Interfaces\IRepository;
use App\DAL\Models\CategoryModel;
use Doctrine\ORM\EntityManagerInterface;

class CategoryRepository extends BaseRepository implements IRepository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, CategoryModel::class);
    }

    public function getById(int $id)
    {
        $entity = $this->getEntity($id);

        $responseData = [
            'id' => $entity->__get('id'),
            'title' => $entity->__get('title'),
            'seo_slug_url' => $entity->__get('seo_slug_url'),
            'created_at' => $entity->__get('created_at'),
            'updated_at' => $entity->__get('updated_at'),
            "status" => $entity->__get('status')
        ];

        echo json_encode(["data" => $responseData, "status" => "success"]);
        exit;
    }


    public function getByCategoryWithSubCategory(int|string $value, int $params = 0)
    {
        if ($params == 0) {
            $entity = $this->getEntity($value);
        } else {
            $entity = $this->entityManager->getRepository(CategoryModel::class)->findBy(['seo_slug_url' => $value]);
        }
        $subCategoryModel = $entity->getSubCategories();
        $subCategory = $this->getSubEntity($subCategoryModel);
        $responseData = [
            'id' => $entity->__get('id'),
            'title' => $entity->__get('title'),
            'seo_slug_url' => $entity->__get('seo_slug_url'),
            'subCategories' => $subCategory,
            'created_at' => $entity->__get('created_at'),
            'updated_at' => $entity->__get('updated_at'),
            "status" => $entity->__get('status')
        ];

        echo json_encode(["data" => $responseData, "status" => "success"]);
        exit;
    }

    public function getByCategoryWithImageAndSubCategory(int|string $value, int $params = 0)
    {
        if ($params == 0) {
            $entity = $this->getEntity($value);
        } else {
            $entity = $this->entityManager->getRepository(CategoryModel::class)->findBy(['seo_slug_url' => $value]);
        }
        $subCategoryModel = $entity->getSubCategories();
        $imageModel = $entity->getImages();
        $subCategory = $this->getSubEntity($subCategoryModel);
        $images = $this->getSubEntity($imageModel);
        $responseData = [
            'id' => $entity->__get('id'),
            'title' => $entity->__get('title'),
            'seo_slug_url' => $entity->__get('seo_slug_url'),
            'subCategories' => $subCategory,
            'images' => $images,
            'created_at' => $entity->__get('created_at'),
            'updated_at' => $entity->__get('updated_at'),
            "status" => $entity->__get('status')
        ];
    }
    public function getAll(): array
    {
        $entities = $this->entityManager->getRepository(CategoryModel::class)->findAll();
        $responseData = [];

        foreach ($entities as $key => $value) {
            $responseData[] = $this->getSubEntity($value);
        }

        echo json_encode(["data" => $responseData, "status" => "success"]);
        return [];
    }

    public function delete(int $id)
    {
    }

    public function save(array $data)
    {
    }

    public function update(int $id, array $data)
    {
    }

    private function getSubEntity($subEntity)
    {
        $arr = [];
        foreach ($subEntity as $key => $value) {
            $arr[$key] = [
                'id' => $value->__get('id'),
                'title' => $value->__get('title'),
                'seo_slug_url' => $value->__get('seo_slug_url'),
                'created_at' => $value->__get('created_at'),
                'updated_at' => $value->__get('updated_at'),
                "status" => $value->__get('status')
            ];
        }
        return $arr;
    }
}