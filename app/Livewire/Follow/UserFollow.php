<?php

namespace App\Livewire\Follow;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserFollow extends Component
{

    public int $userId;

    public bool $following = false;

    public function mount()
    {
        $this->following = Auth::user()->following->contains($this->userId);
    }

    public function render()
    {
        return view('livewire.follow.user-follow');
    }

    public function follow()
    {
        $user = Auth::user();
        if($user){
            $user_auth = User::find($user->id);
        }
        if ($this->following) {
            $user_auth->following()->detach($this->userId);
        } else {
            $user_auth->following()->attach($this->userId);
        }

        $this->following = !$this->following;
    }
}
