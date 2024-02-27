<?php

namespace App\Policies;

use App\Models\Tasks;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TasksPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Logic to determine if the user can view any tasks
        return true; // For example, allow all users to view any task
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tasks $tasks): bool
    {
        // Logic to determine if the user can view a specific task
        return true; // For example, allow all users to view any task
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Logic to determine if the user can create tasks
        return true; // For example, allow all authenticated users to create tasks
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tasks $tasks): bool
    {
        // Logic to determine if the user can update the task
        // For example, allow the user to update their own tasks
        return $user->id === $tasks->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tasks $tasks): bool
    {
        // Logic to determine if the user can delete the task
        // For example, allow the user to delete their own tasks
        return $user->id === $tasks->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tasks $tasks): bool
    {
        // Logic to determine if the user can restore the task (if applicable)
        return false; // For example, disallow task restoration
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tasks $tasks): bool
    {
        // Logic to determine if the user can permanently delete the task (if applicable)
        return false; // For example, disallow permanent deletion
    }
}

