<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="store_images")
 */

class StoreImageModel extends BaseModel
{

    /**
     * @ORM\Column(type="integer")
     */
    protected $is_main;

    /**
     * @ORM\ManyToOne(targetEntity="StoreModel", inversedBy="images")
     * @ORM\JoinColumn(name="store_id", referencedColumnName="id")
     */
    protected $store;

    /**
     * @ORM\ManyToOne(targetEntity="ImageModel", inversedBy="stores")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    protected $image;


}