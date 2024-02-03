<?php

namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */

class ProductModel extends BaseModel
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
     * @ORM\Column(type="string")
     */
    protected $sub_description;

    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\Column(type="float")
     */
    protected $discount;

    /**
     * @ORM\Column(type="integer")
     */
    protected $stock;

    /**
     * @ORM\ManyToOne(targetEntity="ProductTypeModel", inversedBy="products")
     * @ORM\JoinColumn(name="product_type_id", referencedColumnName="id")
     */
    protected $productType;


    /**
     * @ORM\ManyToOne(targetEntity="SubCategoryModel", inversedBy="products")
     * @ORM\JoinColumn(name="sub_category_id", referencedColumnName="id")
     */
    protected $subCategory;

    public function getValues()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'seo_slug_url' => $this->seo_slug_url,
            'description' => $this->description,
            'sub_description' => $this->sub_description,
            'price' => $this->price,
            'discount' => $this->discount,
            'stock' => $this->stock,
            'productType' => $this->productType->getValues(),
            'subCategory' => $this->subCategory->getValues(),
            'status' => $this->status,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date
        ];
    }
}