<?php

namespace App\Livewire\Information;

use Livewire\Component;
use App\Models\Information;
use App\Models\User;
use Illuminate\Validation\Rule;

class ProfileForm extends Component
{

    public $userId;
    public $description;
    public $phone;
    public $schedule = [];

    public function rules()
    {
        return [
            'description' => 'nullable|string|max:500',
            'phone' => [
                'nullable',
                'digits:9',
                Rule::unique('information')->ignore($this->userId, 'pharmacy_id'),
            ],
            'schedule' => 'nullable|array',
            'schedule.*' => 'nullable|string|max:255',
        ];
    }

    public function mount($userId)
    {
        $this->userId = $userId;
        $user = User::findOrFail($this->userId);
        $information = $user->information;

        if ($information) {
            $this->description = $information->description;
            $this->phone = $information->phone;
            $this->schedule = json_decode($information->schedule, true);
        } else {
            $this->schedule = array_fill_keys(
                ['lunes',
                'martes',
                'miercoles',
                'jueves',
                'viernes',
                'sabado',
                'domingo'], ''
            );
        }
    }

    public function save()
    {
        $this->validate();
        
        $schedule = array_filter($this->schedule);

        $data = [
            'description' => $this->description,
            'phone' => $this->phone,
            'pharmacy_id' => $this->userId,
        ];

        if (!empty($schedule)) {
            $data['schedule'] = json_encode($schedule);
        }

        $user = User::findOrFail($this->userId);
        $information = $user->information;
        

        if ($information) {
            $information->update($data);
        } else {
            Information::create($data);
        }

        return redirect()->to('/profile-page/' . $this->userId);
    }

    public function cancel()
    {
        return redirect()->to('/profile-page/' . $this->userId);
    }


    public function render()
    {
        return view('livewire.information.profile-form');
    }
}
