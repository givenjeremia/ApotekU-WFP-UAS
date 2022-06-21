<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class PembeliPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function access(User $user){
        return ($user->role == "Pembeli" ? Response::allow() : Response::deny("You must be a Member")); 
    }
}
