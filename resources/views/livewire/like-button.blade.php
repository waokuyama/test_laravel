<!-- resources/views/livewire/like-button.blade.php -->

<div>
    @if ($post->isLikedBy(auth()->user()))
        <button wire:click="unlike">いいね済み</button>
    @else
        <button wire:click="like">いいね</button>
    @endif
</div>

