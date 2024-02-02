<?php


namespace App\Dal\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="categories")
 */
class CategoryModel extends BaseModel
{


    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $seo_slug_url;


    /**
     * @ORM\OneToMany(targetEntity="SubCategoryModel", mappedBy="CategoryModel")
     */
    private $subCategories;

    public function __construct()
    {
        $this->subCategories = new ArrayCollection();
    }


    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value): void
    {
        $this->$name = $value;

    }

    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }

}

