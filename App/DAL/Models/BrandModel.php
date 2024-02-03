<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="brands")
 */

class BrandModel extends BaseModel
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
     * @ORM\OneToMany(targetEntity="ModelModel", mappedBy="brand")
     */
    protected $models;

    public function __construct()
    {
        parent::__construct();
        $this->models = new ArrayCollection();
    }

    public function getModels(): Collection
    {
        return $this->models;
    }

}