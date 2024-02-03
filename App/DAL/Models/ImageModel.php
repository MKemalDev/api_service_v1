<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="images")
 */

class ImageModel extends BaseModel
{

    /**
     * @ORM\Column(type="string")
     */
    protected $image;

    /**
     * @ORM\Column(type="string")
     */
    protected $status;


    /**
     * @ORM\OneToMany(targetEntity="ProductImageModel", mappedBy="image")
     */
    private $products;
}