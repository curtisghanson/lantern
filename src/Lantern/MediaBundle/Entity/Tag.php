<?php

namespace Lantern\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 */
class Tag
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $longName;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $displayType;

    /**
     * @var string
     */
    private $display;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tagTagA;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tagTagZ;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $media;

    /**
     * @var \Doctrine\Common\Collections\Collection
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
     * Constructor
     */
    public function __construct()
    {
        $this->tagTagA = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tagTagZ = new \Doctrine\Common\Collections\ArrayCollection();
        $this->media = new \Doctrine\Common\Collections\ArrayCollection();
        $this->collection = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set shortName
     *
     * @param string $shortName
     * @return Tag
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    
        return $this;
    }

    /**
     * Get shortName
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set longName
     *
     * @param string $longName
     * @return Tag
     */
    public function setLongName($longName)
    {
        $this->longName = $longName;
    
        return $this;
    }

    /**
     * Get longName
     *
     * @return string 
     */
    public function getLongName()
    {
        return $this->longName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Tag
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
     * Set locale
     *
     * @param string $locale
     * @return Tag
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
     * Set displayType
     *
     * @param string $displayType
     * @return Tag
     */
    public function setDisplayType($displayType)
    {
        $this->displayType = $displayType;
    
        return $this;
    }

    /**
     * Get displayType
     *
     * @return string 
     */
    public function getDisplayType()
    {
        return $this->displayType;
    }

    /**
     * Set display
     *
     * @param string $display
     * @return Tag
     */
    public function setDisplay($display)
    {
        $this->display = $display;
    
        return $this;
    }

    /**
     * Get display
     *
     * @return string 
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Set isEditable
     *
     * @param boolean $isEditable
     * @return Tag
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
     * @return Tag
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
     * @return Tag
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
     * Add tagTagA
     *
     * @param \Lantern\MediaBundle\Entity\TagTag $tagTagA
     * @return Tag
     */
    public function addTagTagA(\Lantern\MediaBundle\Entity\TagTag $tagTagA)
    {
        $this->tagTagA[] = $tagTagA;
    
        return $this;
    }

    /**
     * Remove tagTagA
     *
     * @param \Lantern\MediaBundle\Entity\TagTag $tagTagA
     */
    public function removeTagTagA(\Lantern\MediaBundle\Entity\TagTag $tagTagA)
    {
        $this->tagTagA->removeElement($tagTagA);
    }

    /**
     * Get tagTagA
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTagTagA()
    {
        return $this->tagTagA;
    }

    /**
     * Add tagTagZ
     *
     * @param \Lantern\MediaBundle\Entity\TagTag $tagTagZ
     * @return Tag
     */
    public function addTagTagZ(\Lantern\MediaBundle\Entity\TagTag $tagTagZ)
    {
        $this->tagTagZ[] = $tagTagZ;
    
        return $this;
    }

    /**
     * Remove tagTagZ
     *
     * @param \Lantern\MediaBundle\Entity\TagTag $tagTagZ
     */
    public function removeTagTagZ(\Lantern\MediaBundle\Entity\TagTag $tagTagZ)
    {
        $this->tagTagZ->removeElement($tagTagZ);
    }

    /**
     * Get tagTagZ
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTagTagZ()
    {
        return $this->tagTagZ;
    }

    /**
     * Add media
     *
     * @param \Lantern\MediaBundle\Entity\MediaTag $media
     * @return Tag
     */
    public function addMedia(\Lantern\MediaBundle\Entity\MediaTag $media)
    {
        $this->media[] = $media;
    
        return $this;
    }

    /**
     * Remove media
     *
     * @param \Lantern\MediaBundle\Entity\MediaTag $media
     */
    public function removeMedia(\Lantern\MediaBundle\Entity\MediaTag $media)
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
     * Add collection
     *
     * @param \Lantern\MediaBundle\Entity\CollectionTag $collection
     * @return Tag
     */
    public function addCollection(\Lantern\MediaBundle\Entity\CollectionTag $collection)
    {
        $this->collection[] = $collection;
    
        return $this;
    }

    /**
     * Remove collection
     *
     * @param \Lantern\MediaBundle\Entity\CollectionTag $collection
     */
    public function removeCollection(\Lantern\MediaBundle\Entity\CollectionTag $collection)
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
     * Set createdBy
     *
     * @param \Lantern\AuthBundle\Entity\User $createdBy
     * @return Tag
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
     * @return Tag
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
