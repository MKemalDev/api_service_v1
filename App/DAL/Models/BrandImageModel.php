<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="brand_images")
 */

class BrandImageModel extends BaseModel
{

    /**
     * @ORM\Column(type="integer")
     */
    protected $is_main;

    /**
     * @ORM\ManyToOne(targetEntity="BrandModel", inversedBy="images")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     */
    protected $brand;

    /**
     * @ORM\ManyToOne(targetEntity="ImageModel", inversedBy="brands")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    protected $image;


}