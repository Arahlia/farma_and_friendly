<?php

namespace App\Livewire\Follow;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;

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

    public function render()
    {
        return view('livewire.follow.follow-list', [
            'followingUsers' => $this->followingUsers
        ]);
    }

}
