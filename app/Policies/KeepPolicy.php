<?php

namespace App\Policies;

use App\Keep;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KeepPolicy
{
    use HandlesAuthorization;
    
    public function update(User $user, Keep $keep){
        return $user->id === $keep->user_id;
    }
    
    public function destroy(User $user, Keep $keep){
        return $user->id === $keep->user_id;
    }
}
