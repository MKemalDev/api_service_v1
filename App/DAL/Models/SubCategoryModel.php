<?php

namespace App\DAL\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sub_categories")
 */

class SubCategoryModel extends BaseModel
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
     * @ORM\ManyToOne(targetEntity="CategoryModel", inversedBy="subCategories")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;


    /**
     * @ORM\OneToMany(targetEntity="ProductModel", mappedBy="subCategory" , cascade={"persist", "remove"})
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }


    /**
     * @return Collection|SubCategoryModel[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }


    public function getValues()
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'seo_slug_url' => $this->seo_slug_url,
            'category' => $this->category->getValues(),
            'status' => $this->status,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date
        ];
    }
}