<?php
namespace App\Models\Contracts\Repositories;

use App\Models\Objects\DTO\User;

interface IUserRepository
{
    function Create( User $user );
}