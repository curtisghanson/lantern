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
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $nickname;

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
    private $userRoles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->isActive  = true;
        $this->salt      = md5(uniqid(null, true));
        $this->groups    = new ArrayCollection();
        $this->userRoles = new ArrayCollection();
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
            $this->username,
            $this->firstName,
            $this->lastName,
            $this->nickname,
            $this->password,
            $this->salt,
            $this->email,
            $this->lastLogin,
            $this->isActive,
            $this->isLocked,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->firstName,
            $this->lastName,
            $this->nickname,
            $this->password,
            $this->salt,
            $this->email,
            $this->lastLogin,
            $this->isActive,
            $this->isLocked,
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
     * Set first name
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get first name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set last name
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get last name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    
        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
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

        // declare empty role array
        $roles = [];

        // first get all roles inherited from assigned groups
        foreach ($this->getGroups() as $group) {
            $roles = array_merge($roles, $group->getRoles());
        }

        // then get any roles assigned directly to user
       foreach ($this->userRoles->toArray() as $role) {
            $roles = array_merge($roles, array($role->getRole()));
        }

        // we need to make sure to have at least one role
        $roles[] = static::ROLE_DEFAULT;

        // return a unique array
        return array_unique($roles);
    }

    /**
     * @inheritDoc
     */
    public function getUserRoles()
    {
        return $this->userRoles->toArray();
    }

    /**
     * Add roles
     *
     * @param \Lantern\AuthBundle\Entity\Role $userRoles
     * @return User
     */
    public function addUserRole(\Lantern\AuthBundle\Entity\Role $userRoles)
    {
        $this->userRoles[] = $userRoles;
    
        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Lantern\AuthBundle\Entity\Role $userRoles
     */
    public function removeUserRole(\Lantern\AuthBundle\Entity\Role $userRoles)
    {
        $this->userRoles->removeElement($userRoles);
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
