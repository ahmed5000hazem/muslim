<div>
    <div class="flex flex-col md:flex-row justify-between box-border">
        <div class="grow">
            <p class="p-1">Subject: {{$this->message->subject}}</p>
            <p class="p-1">Name: {{$this->message->name}}</p>
            <p class="p-1">Email: {{$this->message->email}}</p>
            <p class="p-1">Sent at : {{$this->message->created_at->format('Y-M-d')}}</p>
        </div>
        <div class="grow">
            <p class="border-l-2 px-3 border-gray-900"> {{$this->message->message}} </p>
        </div>
    </div>
</div>
