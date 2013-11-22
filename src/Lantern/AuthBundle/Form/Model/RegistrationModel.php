<?php
// src/Lantern/AuthBundle/Form/Model/Registration.php
namespace Lantern\AuthBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Lantern\AuthBundle\Entity\AuthUser;

class Registration
{
    /**
     * @Assert\Type(type="Lantern\AuthBundle\Entity\AuthUser")
     * @Assert\Valid()
     */
    protected $user;

    public function setUser(AuthUser $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

}