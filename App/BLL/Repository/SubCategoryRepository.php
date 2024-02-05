<?php


namespace App\BLL\Repository;

use App\BLL\Interfaces\IRepository;
use App\DAL\Models\SubCategoryModel;
use Doctrine\ORM\EntityManagerInterface;

class SubCategoryRepository extends BaseRepository implements IRepository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, SubCategoryModel::class);
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
        return $responseData;
    }


    public function getBySubCategoryWithImage(int|string $value, int $params = 0)
    {
        if ($params == 0) {
            $entity = $this->getEntity($value);
        } else {
            $entity = $this->entityManager->getRepository(SubCategoryModel::class)->findBy(['seo_slug_url' => $value]);
        }
        $imageModel = $entity->getImages();
        $image = $this->getSubEntity($imageModel);
        $responseData = [
            'id' => $entity->__get('id'),
            'title' => $entity->__get('title'),
            'seo_slug_url' => $entity->__get('seo_slug_url'),
            'images' => $image,
            'created_at' => $entity->__get('created_at'),
            'updated_at' => $entity->__get('updated_at'),
            "status" => $entity->__get('status')
        ];
        echo json_encode(["data" => $responseData, "status" => "success"]);
        return $responseData;
    }
    public function getAll(): array
    {
        $entities = $this->entityManager->getRepository(SubCategoryModel::class)->findAll();
        $responseData = [];
        foreach ($entities as $entity) {
            $imageModel = $entity->getImages();
            $image = $this->getSubEntity($imageModel);
            $responseData[] = [
                'id' => $entity->__get('id'),
                'title' => $entity->__get('title'),
                "images" => $image,
                'seo_slug_url' => $entity->__get('seo_slug_url'),
                'created_at' => $entity->__get('created_at'),
                'updated_at' => $entity->__get('updated_at'),
                "status" => $entity->__get('status')
            ];
        }
        return $responseData;
    }

    public function getAllWithProducts()
    {
        $entities = $this->entityManager->getRepository(SubCategoryModel::class)->findAll();
        $responseData = [];
        foreach ($entities as $entity) {
            $imageModel = $entity->getImages();
            $image = $this->getSubEntity($imageModel);
            $productModel = $entity->getProducts();
            $products = $this->getSubEntity($productModel);
            $responseData[] = [
                'id' => $entity->__get('id'),
                'title' => $entity->__get('title'),
                "images" => $image,
                "image_count" => count($image),
                "products" => $products,
                "products_count" => count($products),
                'seo_slug_url' => $entity->__get('seo_slug_url'),
                'created_at' => $entity->__get('created_at'),
                'updated_at' => $entity->__get('updated_at'),
                "status" => $entity->__get('status')
            ];
        }
        return $responseData;
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
