<?php

namespace Lantern\AuthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Role
 */
class Role implements RoleInterface, \Serializable
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
     * @var \Lantern\AuthBundle\Entity\Role
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users    = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groups   = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->shortName,
            $this->longName,
            $this->description,
            $this->isActive,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->shortName,
            $this->longName,
            $this->description,
            $this->isActive,
        ) = unserialize($serialized);
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
     * @return Role
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
     * @return Role
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
     * @return Role
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
     * @return Role
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
     * @param \Lantern\AuthBundle\Entity\Role $children
     * @return Role
     */
    public function addChildren(\Lantern\AuthBundle\Entity\Role $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Lantern\AuthBundle\Entity\Role $children
     */
    public function removeChildren(\Lantern\AuthBundle\Entity\Role $children)
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
     * @param \Lantern\AuthBundle\Entity\Role $parent
     * @return Role
     */
    public function setParent(\Lantern\AuthBundle\Entity\Role $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Lantern\AuthBundle\Entity\Role 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add users
     *
     * @param \Lantern\AuthBundle\Entity\User $users
     * @return Role
     */
    public function addUser(\Lantern\AuthBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Lantern\AuthBundle\Entity\User $users
     */
    public function removeUser(\Lantern\AuthBundle\Entity\User $users)
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

    /**
     * Add groups
     *
     * @param \Lantern\AuthBundle\Entity\Group $groups
     * @return Role
     */
    public function addGroup(\Lantern\AuthBundle\Entity\Group $groups)
    {
        $this->groups[] = $groups;
    
        return $this;
    }

    /**
     * Remove groups
     *
     * @param \Lantern\AuthBundle\Entity\Group $groups
     */
    public function removeGroup(\Lantern\AuthBundle\Entity\Group $groups)
    {
        $this->users->removeElement($groups);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }

    public function __toString()
    {
        return (string) $this->getShortName();
    }
}
