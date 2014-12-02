<?php

namespace Lantern\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediaTag
 */
class MediaTag
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $vector;

    /**
     * @var boolean
     */
    private $isEditable;

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
     * @var \Lantern\MediaBundle\Entity\Tag
     */
    private $tag;


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
     * Set vector
     *
     * @param float $vector
     * @return MediaTag
     */
    public function setVector($vector)
    {
        $this->vector = $vector;
    
        return $this;
    }

    /**
     * Get vector
     *
     * @return float 
     */
    public function getVector()
    {
        return $this->vector;
    }

    /**
     * Set isEditable
     *
     * @param boolean $isEditable
     * @return MediaTag
     */
    public function setIsEditable($isEditable)
    {
        $this->isEditable = $isEditable;
    
        return $this;
    }

    /**
     * Get isEditable
     *
     * @return boolean 
     */
    public function getIsEditable()
    {
        return $this->isEditable;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return MediaTag
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
     * @return MediaTag
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
     * @return MediaTag
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
     * Set tag
     *
     * @param \Lantern\MediaBundle\Entity\Tag $tag
     * @return MediaTag
     */
    public function setTag(\Lantern\MediaBundle\Entity\Tag $tag = null)
    {
        $this->tag = $tag;
    
        return $this;
    }

    /**
     * Get tag
     *
     * @return \Lantern\MediaBundle\Entity\Tag 
     */
    public function getTag()
    {
        return $this->tag;
    }
}
