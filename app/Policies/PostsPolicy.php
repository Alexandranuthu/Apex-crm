<?php

namespace App\Policies;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostsPolicy
{
    public function viewAny(User $user): bool
    {
        // Allow all users to view any posts
        return true;
    }

    public function view(User $user, Posts $post): bool
    {
        // Allow all users to view a specific post
        return true;
    }

    public function create(User $user): bool
    {
        // Only authenticated users can create posts
        return $user->exists;
    }

    public function update(User $user, Posts $post): bool
    {
        // Only the post owner can update the post
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Posts $post): bool
    {
        // Only the post owner can delete the post
        return $user->id === $post->user_id;
    }

    public function restore(User $user, Posts $post): bool
    {
        // Only the post owner can restore the post
        return $user->id === $post->user_id;
    }

    public function forceDelete(User $user, Posts $post): bool
    {
        // Only the post owner can permanently delete the post
        return $user->id === $post->user_id;
    }
}
