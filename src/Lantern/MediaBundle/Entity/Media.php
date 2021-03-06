<?php

namespace Lantern\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 */
class Media
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
     * @var \DateTime
     */
    private $releaseDate;

    /**
     * @var string
     */
    private $mediaType;

    /**
     * @var boolean
     */
    private $hasFile;

    /**
     * @var float
     */
    private $avgRating;

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
    private $collection;

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
        $this->collection = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Media
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
     * @return Media
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
     * @return Media
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
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Media
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    
        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set mediaType
     *
     * @param string $mediaType
     * @return Media
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
    
        return $this;
    }

    /**
     * Get mediaType
     *
     * @return string 
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * Set hasFile
     *
     * @param boolean $hasFile
     * @return Media
     */
    public function setHasFile($hasFile)
    {
        $this->hasFile = $hasFile;
    
        return $this;
    }

    /**
     * Get hasFile
     *
     * @return boolean 
     */
    public function getHasFile()
    {
        return $this->hasFile;
    }

    /**
     * Set avgRating
     *
     * @param float $avgRating
     * @return Media
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
     * Set locale
     *
     * @param string $locale
     * @return Media
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
     * @return Media
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
     * @return Media
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
     * @return Media
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
     * Add collection
     *
     * @param \Lantern\MediaBundle\Entity\MediaCollection $collection
     * @return Media
     */
    public function addCollection(\Lantern\MediaBundle\Entity\MediaCollection $collection)
    {
        $this->collection[] = $collection;
    
        return $this;
    }

    /**
     * Remove collection
     *
     * @param \Lantern\MediaBundle\Entity\MediaCollection $collection
     */
    public function removeCollection(\Lantern\MediaBundle\Entity\MediaCollection $collection)
    {
        $this->collection->removeElement($collection);
    }

    /**
     * Get collection
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Add tag
     *
     * @param \Lantern\MediaBundle\Entity\MediaTag $tag
     * @return Media
     */
    public function addTag(\Lantern\MediaBundle\Entity\MediaTag $tag)
    {
        $this->tag[] = $tag;
    
        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Lantern\MediaBundle\Entity\MediaTag $tag
     */
    public function removeTag(\Lantern\MediaBundle\Entity\MediaTag $tag)
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
     * @return Media
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
     * @return Media
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
     * @return Media
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
