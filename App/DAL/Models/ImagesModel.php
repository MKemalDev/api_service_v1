<?php


namespace App\DAL\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="images")
 */

class ImagesModel extends BaseModel
{

    /**
     * @ORM\Column(type="string")
     */
    protected $image;
}