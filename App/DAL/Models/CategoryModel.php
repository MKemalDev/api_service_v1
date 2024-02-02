<?php

namespace App\DAL\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */

class CategoryModel extends BaseModel
{
    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="string")
     */
    protected $seo_slug_url;


    /**
     * @ORM\OneToMany(targetEntity="SubCategoryModel", mappedBy="category")
     */
    private $subCategories;

    public function __get($name)
    {

        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function __set($name, $value)
    {

        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function __construct()
    {
        $this->subCategories = new ArrayCollection();
    }



}