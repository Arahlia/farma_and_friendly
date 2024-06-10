<?php

namespace App\Livewire\Follow;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowList extends Component
{

    public $followingUsers = [];

    public function mount()
    {
        $user = Auth::user();
        if ($user) {
            // Assuming there is a `following` relationship defined on the User model
            $this->followingUsers = $user->following;
        }
    }

    public function render()
    {
        return view('livewire.follow.follow-list', [
            'followingUsers' => $this->followingUsers
        ]);
    }

}
