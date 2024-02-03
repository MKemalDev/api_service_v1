<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="model_images")
 */

class ModelImageModel extends BaseModel
{



    /**
     * @ORM\ManyToOne(targetEntity="ModelModel", inversedBy="images")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    protected $model;

    /**
     * @ORM\ManyToOne(targetEntity="ImageModel", inversedBy="models")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    protected $image;


}