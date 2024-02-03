<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="stores")
 */

class StoreModel extends BaseModel
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
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="ProductModel", mappedBy="store")
     */
    protected $products;


    public function __construct()
    {
        parent::__construct();
        $this->products = new ArrayCollection();

    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

}