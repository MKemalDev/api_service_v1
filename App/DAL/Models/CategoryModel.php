<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * @ORM\OneToMany(targetEntity="SubCategoryModel", mappedBy="category" , cascade={"persist" ,"remove"})
     */
    protected $subCategories;

    public function __construct()
    {
        parent::__construct();
        $this->subCategories = new ArrayCollection();
        $this->images = new ArrayCollection();

    }

    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }


    /**
     * @ORM\ManyToMany(targetEntity="ImageModel", cascade={"persist" ,"remove"})
     * @ORM\JoinTable(name="category_images",
     *      joinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")},
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