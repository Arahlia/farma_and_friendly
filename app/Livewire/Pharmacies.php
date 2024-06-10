<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\User;

class Pharmacies extends Component
{

    public $field;
    public $value;
    public $pharmacies = [];

    protected $listeners = ['messageUser' => 'message'];

    public function message($userId)
    {

        $authenticatedUserId = auth()->id();

        # Check if conversation already exists
        $existingConversation = Conversation::where(function ($query) use ($authenticatedUserId, $userId) {
            $query->where('sender_id', $authenticatedUserId)
                ->where('receiver_id', $userId);
        })
            ->orWhere(function ($query) use ($authenticatedUserId, $userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $authenticatedUserId);
            })->first();

        if ($existingConversation) {
            # Conversation already exists, redirect to existing conversation
            return redirect()->route('chat', ['query' => $existingConversation->id]);
        }

        # Create new conversation
        $createdConversation = Conversation::create([
            'sender_id' => $authenticatedUserId,
            'receiver_id' => $userId,
        ]);

        return redirect()->route('chat', ['query' => $createdConversation->id]);
    }


    public function searchPharmacies()
    {
        if (in_array($this->field, ['city', 'cp', 'address', 'name'])) {
            $this->pharmacies = User::where('role', 'pharmacy')
                ->where($this->field, 'like', '%' . $this->value . '%')
                ->get();
        } else {
            $this->pharmacies = 'No se han encontrado resultados';
        }
    }

    public function render()
    {
        return view('livewire.pharmacies', [
            'users' => !empty($this->pharmacies) ? $this->pharmacies : User::where('role', 'pharmacy')
                ->where('id', '!=', auth()->id())->get()
        ]);
    }
}
