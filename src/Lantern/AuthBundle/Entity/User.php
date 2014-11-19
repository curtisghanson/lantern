<?php

namespace Lantern\AuthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * User
 */
class User implements AdvancedUserInterface, \Serializable
{
    const ROLE_DEFAULT           = 'ROLE_USER';
    const ROLE_USER              = 'ROLE_USER';
    const ROLE_ADMIN             = 'ROLE_ADMIN';
    const ROLE_SUPER_ADMIN       = 'ROLE_SUPER_ADMIN';
    const ROLE_ALLOWED_TO_SWITCH = 'ROLE_ALLOWED_TO_SWITCH';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $lastLogin;

    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var boolean
     */
    private $isLocked;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $roles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->isActive = true;
        $this->salt     = md5(uniqid(null, true));
        $this->groups   = new ArrayCollection();
        $this->roles    = new ArrayCollection();
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    
        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
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
     * Set isLocked
     *
     * @param boolean $isLocked
     * @return User
     */
    public function setIsLocked($isLocked)
    {
        $this->isLocked = $isLocked;
    
        return $this;
    }

    /**
     * Get isLocked
     *
     * @return boolean 
     */
    public function getIsLocked()
    {
        return $this->isLocked;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        #return $this->roles->toArray();
        
        $roles = $this->roles->toArray();

        foreach ($this->getGroups() as $group) {
            $roles = array_merge($roles, $group->getRoles());
        }

        // we need to make sure to have at least one role
        $roles[] = static::ROLE_DEFAULT;

        return array_unique($roles);
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

    /**
     * @inheritDoc
     */
    public function getGroups()
    {
        return $this->groups->toArray();
    }

    /**
     * Add groups
     *
     * @param \Lantern\AuthBundle\Entity\Group $groups
     * @return User
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
        $this->groups->removeElement($groups);
    }

    public function __toString()
    {
        return (string) $this->getUsername();
    }

}
