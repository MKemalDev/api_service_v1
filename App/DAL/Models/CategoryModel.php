<?php

namespace App\DAL\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */

class CategoryModel extends BaseModel
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
     * @ORM\OneToMany(targetEntity="SubCategoryModel", mappedBy="category" , cascade={"persist", "remove"})
     */
    protected $subCategories;



    public function __construct()
    {
        $this->subCategories = new ArrayCollection();
    }


    public function getValues()
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'seo_slug_url' => $this->seo_slug_url,
            'status' => $this->status,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date
        ];
    }

    /**
     * @return Collection|SubCategoryModel[]
     */
    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }



}