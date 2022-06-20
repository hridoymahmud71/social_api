<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePostPolicy
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

    public function post(User $user,Page $page)
    {
        dd( $user->id ,$page->user_id);
        return $user->id == $page->user_id;
    }
}
