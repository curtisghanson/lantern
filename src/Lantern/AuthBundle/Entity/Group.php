<?php

namespace Lantern\AuthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 */
class Group implements \Serializable
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
     * @var \Lantern\AuthBundle\Entity\Group
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $roles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users    = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles    = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }


    public function getGroup()
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
     * @return Group
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
     * @return Group
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
     * @return Group
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
     * @return Group
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
     * @param \Lantern\AuthBundle\Entity\Group $children
     * @return Group
     */
    public function addChildren(\Lantern\AuthBundle\Entity\Group $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Lantern\AuthBundle\Entity\Group $children
     */
    public function removeChildren(\Lantern\AuthBundle\Entity\Group $children)
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
     * @param \Lantern\AuthBundle\Entity\Group $parent
     * @return Group
     */
    public function setParent(\Lantern\AuthBundle\Entity\Group $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Lantern\AuthBundle\Entity\Group 
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
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    /**
     * Add roles
     *
     * @param \Lantern\AuthBundle\Entity\Role $roles
     * @return User
     */
    public function addRole(\Lantern\AuthBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;
    
        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Lantern\AuthBundle\Entity\Role $roles
     */
    public function removeRole(\Lantern\AuthBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }

    public function __toString()
    {
        return (string) $this->getShortName();
    }
}
