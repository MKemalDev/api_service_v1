<?php

namespace App\DAL\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="types")
 */

class TypeModel extends BaseModel
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
     * @ORM\OneToMany(targetEntity="CategoryModel", mappedBy="type" , cascade={"persist", "remove"})
     */
    protected $categories;



    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }


    /**
     * @return Collection|CategoryModel[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

}