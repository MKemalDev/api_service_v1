<?php


namespace App\BLL\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;

class BaseRepository
{
    protected EntityManagerInterface $entityManager;
    protected $entityClass;

    public function __construct(EntityManagerInterface $entityManager, $entityClass)
    {
        $this->entityManager = $entityManager;
        $this->entityClass = new $entityClass();
    }

    protected function saveEntity(array $data)
    {
        $entity = $this->entityClass;
        foreach ($data as $key => $value) {
            $entity->$key = $value;
        }
        return $entity;
    }

    protected function updateEntity(int $id, array $data)
    {
        $entity = $this->entityManager->find($this->entityClass::class, $id);
        foreach ($data as $key => $value) {
            $entity->$key = $value;
        }
        return $entity;
    }

    protected function deleteEntity(int $id)
    {
        $entity = $this->entityManager->find($this->entityClass::class, $id);
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
        return [];
    }

    protected function getEntity(int $id)
    {
        return $this->entityManager->find($this->entityClass::class, $id);
    }
}