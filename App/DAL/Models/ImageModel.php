<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="images")
 */

class ImageModel extends BaseModel
{

    /**
     * @ORM\Column(type="string")
     */
    protected $image;

    /**
     * @ORM\Column(type="string")
     */
    protected $status;

    /**
     * @ORM\Column(type="integer")
     */
    protected $is_main;


    /**
     * @ORM\OneToMany(targetEntity="ProductImageModel", mappedBy="image")
     */
    private $products;


    /**
     * @ORM\OneToMany(targetEntity="BrandImageModel", mappedBy="image")
     */
    private $brands;

    /**
     * @ORM\OneToMany(targetEntity="CategoryImageModel", mappedBy="image")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="ModelImageModel", mappedBy="image")
     */
    private $models;

    /**
     * @ORM\OneToMany(targetEntity="SubCategoryImageModel", mappedBy="image")
     */
    private $subCategories;


    /**
     * @ORM\OneToMany(targetEntity="StoreImageModel", mappedBy="image")
     */
    private $stores;
}