<?php

namespace App\DAL\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\MappedSuperclass
 */
class BaseModel
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

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
}
