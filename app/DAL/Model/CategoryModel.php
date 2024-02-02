<?php

namespace App\Dal\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class CategoryModel extends BaseModel
{
    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $seo_slug_url;

    /**
     * @ORM\OneToMany(targetEntity="SubCategoryModel", mappedBy="categoryModel")
     */
    private $subCategories;

    public function __construct()
    {
        parent::__construct();
        $this->subCategories = new ArrayCollection();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getSeoSlugUrl(): ?string
    {
        return $this->seo_slug_url;
    }

    public function setSeoSlugUrl(string $seo_slug_url): void
    {
        $this->seo_slug_url = $seo_slug_url;
    }

    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }
}