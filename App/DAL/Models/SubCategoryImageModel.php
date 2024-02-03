<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sub_category_images")
 */

class SubCategoryImageModel extends BaseModel
{



    /**
     * @ORM\ManyToOne(targetEntity="SubCategoryModel", inversedBy="images")
     * @ORM\JoinColumn(name="sub_category_id", referencedColumnName="id")
     */
    protected $subCategory;

    /**
     * @ORM\ManyToOne(targetEntity="ImageModel", inversedBy="subCategories")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    protected $image;


}