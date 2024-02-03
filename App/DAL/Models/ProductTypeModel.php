<?php

namespace App\DAL\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_types")
 */

class ProductTypeModel extends BaseModel
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
     * @ORM\OneToMany(targetEntity="ProductModel", mappedBy="productType" , cascade={"persist", "remove"})
     */
    protected $products;


    public function __construct()
    {
        $this->products = new ArrayCollection();
    }


    /**
     * @return Collection|ProductModel[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

}