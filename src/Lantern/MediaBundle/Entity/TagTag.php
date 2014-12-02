<?php

namespace Lantern\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TagTag
 */
class TagTag
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $vector;

    /**
     * @var integer
     */
    private $aLevel;

    /**
     * @var integer
     */
    private $zLevel;

    /**
     * @var string
     */
    private $relationship;

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
     * @var \Lantern\MediaBundle\Entity\Tag
     */
    private $tagA;

    /**
     * @var \Lantern\MediaBundle\Entity\Tag
     */
    private $tagZ;


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
     * Set description
     *
     * @param string $description
     * @return TagTag
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
     * Set vector
     *
     * @param float $vector
     * @return TagTag
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
     * Set aLevel
     *
     * @param integer $aLevel
     * @return TagTag
     */
    public function setALevel($aLevel)
    {
        $this->aLevel = $aLevel;
    
        return $this;
    }

    /**
     * Get aLevel
     *
     * @return integer 
     */
    public function getALevel()
    {
        return $this->aLevel;
    }

    /**
     * Set zLevel
     *
     * @param integer $zLevel
     * @return TagTag
     */
    public function setZLevel($zLevel)
    {
        $this->zLevel = $zLevel;
    
        return $this;
    }

    /**
     * Get zLevel
     *
     * @return integer 
     */
    public function getZLevel()
    {
        return $this->zLevel;
    }

    /**
     * Set relationship
     *
     * @param string $relationship
     * @return TagTag
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
    
        return $this;
    }

    /**
     * Get relationship
     *
     * @return string 
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * Set isEditable
     *
     * @param boolean $isEditable
     * @return TagTag
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
     * @return TagTag
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
     * @return TagTag
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
     * Set tagA
     *
     * @param \Lantern\MediaBundle\Entity\Tag $tagA
     * @return TagTag
     */
    public function setTagA(\Lantern\MediaBundle\Entity\Tag $tagA = null)
    {
        $this->tagA = $tagA;
    
        return $this;
    }

    /**
     * Get tagA
     *
     * @return \Lantern\MediaBundle\Entity\Tag 
     */
    public function getTagA()
    {
        return $this->tagA;
    }

    /**
     * Set tagZ
     *
     * @param \Lantern\MediaBundle\Entity\Tag $tagZ
     * @return TagTag
     */
    public function setTagZ(\Lantern\MediaBundle\Entity\Tag $tagZ = null)
    {
        $this->tagZ = $tagZ;
    
        return $this;
    }

    /**
     * Get tagZ
     *
     * @return \Lantern\MediaBundle\Entity\Tag 
     */
    public function getTagZ()
    {
        return $this->tagZ;
    }
}
