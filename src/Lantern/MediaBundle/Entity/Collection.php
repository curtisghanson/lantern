<?php

namespace Lantern\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collection
 */
class Collection
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $collectionType;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $stopDate;

    /**
     * @var float
     */
    private $avgRating;

    /**
     * @var integer
     */
    private $childOrder;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $media;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tag;

    /**
     * @var \Lantern\MediaBundle\Entity\Collection
     */
    private $parent;

    /**
     * @var \Lantern\AuthBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \Lantern\AuthBundle\Entity\User
     */
    private $updatedBy;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->media = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Collection
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Collection
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    
        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Collection
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set collectionType
     *
     * @param string $collectionType
     * @return Collection
     */
    public function setCollectionType($collectionType)
    {
        $this->collectionType = $collectionType;
    
        return $this;
    }

    /**
     * Get collectionType
     *
     * @return string 
     */
    public function getCollectionType()
    {
        return $this->collectionType;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Collection
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    
        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set stopDate
     *
     * @param \DateTime $stopDate
     * @return Collection
     */
    public function setStopDate($stopDate)
    {
        $this->stopDate = $stopDate;
    
        return $this;
    }

    /**
     * Get stopDate
     *
     * @return \DateTime 
     */
    public function getStopDate()
    {
        return $this->stopDate;
    }

    /**
     * Set avgRating
     *
     * @param float $avgRating
     * @return Collection
     */
    public function setAvgRating($avgRating)
    {
        $this->avgRating = $avgRating;
    
        return $this;
    }

    /**
     * Get avgRating
     *
     * @return float 
     */
    public function getAvgRating()
    {
        return $this->avgRating;
    }

    /**
     * Set childOrder
     *
     * @param integer $childOrder
     * @return Collection
     */
    public function setChildOrder($childOrder)
    {
        $this->childOrder = $childOrder;
    
        return $this;
    }

    /**
     * Get childOrder
     *
     * @return integer 
     */
    public function getChildOrder()
    {
        return $this->childOrder;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Collection
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    
        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Collection
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Collection
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set attributes
     *
     * @param array $attributes
     * @return Collection
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    
        return $this;
    }

    /**
     * Get attributes
     *
     * @return array 
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Add children
     *
     * @param \Lantern\MediaBundle\Entity\Collection $children
     * @return Collection
     */
    public function addChildren(\Lantern\MediaBundle\Entity\Collection $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Lantern\MediaBundle\Entity\Collection $children
     */
    public function removeChildren(\Lantern\MediaBundle\Entity\Collection $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add media
     *
     * @param \Lantern\MediaBundle\Entity\MediaCollection $media
     * @return Collection
     */
    public function addMedia(\Lantern\MediaBundle\Entity\MediaCollection $media)
    {
        $this->media[] = $media;
    
        return $this;
    }

    /**
     * Remove media
     *
     * @param \Lantern\MediaBundle\Entity\MediaCollection $media
     */
    public function removeMedia(\Lantern\MediaBundle\Entity\MediaCollection $media)
    {
        $this->media->removeElement($media);
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Add tag
     *
     * @param \Lantern\MediaBundle\Entity\CollectionTag $tag
     * @return Collection
     */
    public function addTag(\Lantern\MediaBundle\Entity\CollectionTag $tag)
    {
        $this->tag[] = $tag;
    
        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Lantern\MediaBundle\Entity\CollectionTag $tag
     */
    public function removeTag(\Lantern\MediaBundle\Entity\CollectionTag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set parent
     *
     * @param \Lantern\MediaBundle\Entity\Collection $parent
     * @return Collection
     */
    public function setParent(\Lantern\MediaBundle\Entity\Collection $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Lantern\MediaBundle\Entity\Collection 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set createdBy
     *
     * @param \Lantern\AuthBundle\Entity\User $createdBy
     * @return Collection
     */
    public function setCreatedBy(\Lantern\AuthBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;
    
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Lantern\AuthBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param \Lantern\AuthBundle\Entity\User $updatedBy
     * @return Collection
     */
    public function setUpdatedBy(\Lantern\AuthBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;
    
        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \Lantern\AuthBundle\Entity\User 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
