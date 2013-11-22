<?php

namespace Lantern\AuthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * AuthRole
 */
class AuthRole implements RoleInterface
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
     * @var boolean
     */
    private $isActive;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Lantern\AuthBundle\Entity\AuthRole
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getRole()
    {
        return $this->getShortName();
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
     * @return AuthRole
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
     * @return AuthRole
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
     * @return AuthRole
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return AuthRole
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add children
     *
     * @param \Lantern\AuthBundle\Entity\AuthRole $children
     * @return AuthRole
     */
    public function addChildren(\Lantern\AuthBundle\Entity\AuthRole $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Lantern\AuthBundle\Entity\AuthRole $children
     */
    public function removeChildren(\Lantern\AuthBundle\Entity\AuthRole $children)
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
     * Set parent
     *
     * @param \Lantern\AuthBundle\Entity\AuthRole $parent
     * @return AuthRole
     */
    public function setParent(\Lantern\AuthBundle\Entity\AuthRole $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Lantern\AuthBundle\Entity\AuthRole 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add users
     *
     * @param \Lantern\AuthBundle\Entity\AuthUser $users
     * @return AuthRole
     */
    public function addUser(\Lantern\AuthBundle\Entity\AuthUser $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Lantern\AuthBundle\Entity\AuthUser $users
     */
    public function removeUser(\Lantern\AuthBundle\Entity\AuthUser $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __toString()
    {
        return (string) $this->getShortName();
    }
}
