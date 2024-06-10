<?php

namespace App\Livewire\Information;

use Livewire\Component;
use App\Models\User;

class ProfilePage extends Component
{

    public $userId;
    public $user;
    public $information;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::findOrFail($this->userId);
        $this->information = $this->user->information;
    }

    public function render()
    {
        return view('livewire.information.profile-page');
    }

    public function addInformation()
    {
        return redirect()->to('/profile-form/' . $this->userId);
    }

}
