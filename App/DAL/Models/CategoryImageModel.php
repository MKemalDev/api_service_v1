<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category_images")
 */

class CategoryImageModel extends BaseModel
{



    /**
     * @ORM\ManyToOne(targetEntity="CategoryModel", inversedBy="images")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="ImageModel", inversedBy="categories")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    protected $image;


}