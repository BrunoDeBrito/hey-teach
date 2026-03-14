<?php

use App\Models\User;

if (function_exists('user') === false) {
    /**
     * Get the current user.
     * @return User|null
     */
    function user(): ?User
    {
        if (auth()->check()) {
            return auth()->user();
        }

        return null;
    }
}
