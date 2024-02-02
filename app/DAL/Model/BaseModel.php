<?php

// src/Entity/BaseEntity.php
namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\MappedSuperclass
 */
class BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $create_date;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $update_date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $status;

    public function __construct()
    {
        $this->create_date = new DateTime();
        $this->update_date = new DateTime();
        $this->status = 1;
    }
}