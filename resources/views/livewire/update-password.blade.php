<div>
    <form wire:submit.prevent="updatePassword">
        {{$this->form}}
        <button type="submit" class="rounded px-4 py-2 text-sm bg-gray-900 mt-6 text-slate-50">update password</button>
    </form>
</div>
