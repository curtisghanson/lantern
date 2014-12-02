<?php

namespace Lantern\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CollectionTag
 */
class CollectionTag
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
     * @var \Lantern\MediaBundle\Entity\Collection
     */
    private $collection;

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
     * @return CollectionTag
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
     * @return CollectionTag
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
     * @return CollectionTag
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
     * @return CollectionTag
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
     * Set collection
     *
     * @param \Lantern\MediaBundle\Entity\Collection $collection
     * @return CollectionTag
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
     * Set tag
     *
     * @param \Lantern\MediaBundle\Entity\Tag $tag
     * @return CollectionTag
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
