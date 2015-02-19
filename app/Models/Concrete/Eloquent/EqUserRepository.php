<?php

namespace App\Models\Concrete\Eloquent;

use App\Models\Contracts\Repositories\IUserRepository;
use App\Models\Objects\DTO\User;

class EqUserRepository implements IUserRepository
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function Create( User $user )
    {
        return User::create( [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'password' => bcrypt( $user->password ),
                ] );
    }

}
