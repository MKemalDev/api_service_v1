<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_images")
 */

class ProductImageModel extends BaseModel
{

    /**
     * @ORM\Column(type="integer")
     */
    protected $is_main;

    /**
     * @ORM\ManyToOne(targetEntity="ProductModel", inversedBy="images")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

    /**
     * @ORM\ManyToOne(targetEntity="ImageModel", inversedBy="products")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    protected $image;


}