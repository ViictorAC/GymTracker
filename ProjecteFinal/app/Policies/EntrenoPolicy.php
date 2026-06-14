<?php

namespace App\Policies;

use App\Models\Entreno;
use App\Models\User;

class EntrenoPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Entreno $entreno): bool
    {
        return $user->id === $entreno->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Entreno $entreno): bool
    {
        return $user->id === $entreno->user_id;
    }

    public function delete(User $user, Entreno $entreno): bool
    {
        return $user->id === $entreno->user_id;
    }

    public function restore(User $user, Entreno $entreno): bool
    {
        return $user->id === $entreno->user_id;
    }

    public function forceDelete(User $user, Entreno $entreno): bool
    {
        return $user->id === $entreno->user_id;
    }
}
