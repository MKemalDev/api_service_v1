<?php

namespace App\DAL\Models;

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
    private $category;
}