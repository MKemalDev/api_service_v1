<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="models")
 */

class ModelModel extends BaseModel
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
     * @ORM\ManyToOne(targetEntity="BrandModel", inversedBy="models", cascade={"persist"})
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     */
    protected $brand;


    /**
     * @ORM\OneToMany(targetEntity="ProductModel", mappedBy="model" , cascade={"persist","remove"})
     */
    protected $products;

    public function __construct()
    {
        parent::__construct();
        $this->products = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }


    /**
     * @ORM\ManyToMany(targetEntity="ImageModel", cascade={"persist","remove"})
     * @ORM\JoinTable(name="model_images",
     *      joinColumns={@ORM\JoinColumn(name="model_id", referencedColumnName="id")},
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