<?php

namespace App\Policies;

use App\Models\Rutina;
use App\Models\User;

class RutinaPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Rutina $rutina): bool
    {
        return $user->id === $rutina->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Rutina $rutina): bool
    {
        return $user->id === $rutina->user_id;
    }

    public function delete(User $user, Rutina $rutina): bool
    {
        return $user->id === $rutina->user_id;
    }

    public function restore(User $user, Rutina $rutina): bool
    {
        return $user->id === $rutina->user_id;
    }

    public function forceDelete(User $user, Rutina $rutina): bool
    {
        return $user->id === $rutina->user_id;
    }
}
