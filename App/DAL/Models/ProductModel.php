<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */

class ProductModel extends BaseModel
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
     * @ORM\Column(type="string")
     */
    protected $description;


    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\Column(type="float")
     */
    protected $discount;

    /**
     * @ORM\ManyToOne(targetEntity="ModelModel", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    protected $model;


    /**
     * @ORM\ManyToOne(targetEntity="SubCategoryModel", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="sub_category_id", referencedColumnName="id")
     */
    protected $subCategory;


    /**
     * @ORM\ManyToOne(targetEntity="StoreModel", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="store_id", referencedColumnName="id")
     */
    protected $store;



    /**
     * @ORM\ManyToMany(targetEntity="ImageModel", cascade={"persist"})
     * @ORM\JoinTable(name="product_images",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id")}
     * )
     */
    protected $images;

    public function __construct()
    {
        parent::__construct();
        $this->images = new ArrayCollection();
    }

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