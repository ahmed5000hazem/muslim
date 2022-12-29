<?php

namespace App\Http\Livewire\Contact;

use App\Models\Message;
use Livewire\Component;

class Show extends Component
{
    public $message;

    public function mount()
    {
        Message::where('id', $this->message->id)->update(['read_at' => now('Africa/Cairo')]);
    }

    public function render()
    {
        return view('livewire.contact.show');
    }
}
