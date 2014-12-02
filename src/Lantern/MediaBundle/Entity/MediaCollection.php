<?php

namespace Lantern\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediaCollection
 */
class MediaCollection
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
     * @var integer
     */
    private $mediaOrder;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Lantern\MediaBundle\Entity\Media
     */
    private $media;

    /**
     * @var \Lantern\MediaBundle\Entity\Collection
     */
    private $collection;

    /**
     * @var \Lantern\AuthBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \Lantern\AuthBundle\Entity\User
     */
    private $updatedBy;


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
     * @return MediaCollection
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
     * @return MediaCollection
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
     * @return MediaCollection
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
     * Set mediaOrder
     *
     * @param integer $mediaOrder
     * @return MediaCollection
     */
    public function setMediaOrder($mediaOrder)
    {
        $this->mediaOrder = $mediaOrder;
    
        return $this;
    }

    /**
     * Get mediaOrder
     *
     * @return integer 
     */
    public function getMediaOrder()
    {
        return $this->mediaOrder;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return MediaCollection
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
     * @return MediaCollection
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
     * Set media
     *
     * @param \Lantern\MediaBundle\Entity\Media $media
     * @return MediaCollection
     */
    public function setMedia(\Lantern\MediaBundle\Entity\Media $media = null)
    {
        $this->media = $media;
    
        return $this;
    }

    /**
     * Get media
     *
     * @return \Lantern\MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set collection
     *
     * @param \Lantern\MediaBundle\Entity\Collection $collection
     * @return MediaCollection
     */
    public function setCollection(\Lantern\MediaBundle\Entity\Collection $collection = null)
    {
        $this->collection = $collection;
    
        return $this;
    }

    /**
     * Get collection
     *
     * @return \Lantern\MediaBundle\Entity\Collection 
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set createdBy
     *
     * @param \Lantern\AuthBundle\Entity\User $createdBy
     * @return MediaCollection
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
     * @return MediaCollection
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
