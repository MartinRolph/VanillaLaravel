<?php

namespace App\Models\Concrete\Doctrine;

use DocDbContext;

use App\Models\Contracts\Repositories\IUserRepository;
use App\Models\Objects\DTO\User;

class DocUserRepository extends DocDbContext implements IUserRepository
{
    private $context;
    
    public function __Construct()
    {
        $this->context = $this->GetEntityManager();
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function Create( User $user )
    {
        return new User();
    }
    
    public function GetByID( $id )
    {
        
        return 
    }

}
