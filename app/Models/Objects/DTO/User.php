<?php

namespace App\Models\Objects\DTO;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="users")
 */
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     **/
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $first_name;
    
    /**
     * @Column(type="string")
     * @var string
     **/
    protected $last_name;

    public function __construct()
    {
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName( $firstName )
    {
        $this->first_name = $firstName;
    }
    
    public function getLastName()
    {
        return $this->last_name;
    }

    public function setName( $lastName )
    {
        $this->last_name = $lastName;
    }
}