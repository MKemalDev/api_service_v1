<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="sub_categories")
 */
class SubCategoryModel extends BaseModel
{


    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $seo_slug_url;

    /**
     * @ORM\Column(type="integer")
     */
    private $category_id;



    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value): self
    {
        $this->$name = $value;
        return $this;
    }

}

