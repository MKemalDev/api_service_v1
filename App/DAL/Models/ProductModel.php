<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * @ORM\Column(type="string")
     */
    protected $description;


    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\Column(type="float")
     */
    protected $discount;

    /**
     * @ORM\ManyToOne(targetEntity="ModelModel", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    protected $model;


    /**
     * @ORM\ManyToOne(targetEntity="SubCategoryModel", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="sub_category_id", referencedColumnName="id")
     */
    protected $subCategory;


    /**
     * @ORM\ManyToOne(targetEntity="VendorModel", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="vendor_id", referencedColumnName="id")
     */
    protected $vendor;





}