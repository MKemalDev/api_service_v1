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
        $this->images = new ArrayCollection();

    }

    public function getModels(): Collection
    {
        return $this->models;
    }



    /**
     * @ORM\ManyToMany(targetEntity="ImageModel", cascade={"persist","remove"})
     * @ORM\JoinTable(name="brand_images",
     *      joinColumns={@ORM\JoinColumn(name="brand_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id")}
     * )
     */
    protected $images;


    public function addImage(ImageModel $image)
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
        }
    }

    public function removeImage(ImageModel $image)
    {
        $this->images->removeElement($image);
    }

    public function getImages()
    {
        return $this->images;
    }

}