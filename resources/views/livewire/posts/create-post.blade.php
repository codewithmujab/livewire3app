<div>
    {{ $title }} <br />

    <span>Author : {{ $author }}</span> <br />

    @foreach ($posts as $post)
        <div wire:key="{{ $post->id }}">
            {{-- data --}}
            <span class="font-bold text-blue-500">{{ $post->title }}</span> <br />
            {{ $post->content }} <br />
            {{ $post->created_at }}
            <br />
            <button type="button" class="text-red-500 underline" wire:click="delete"
                wire:confirm="Are you sure you want to delete this post?">
                Delete
            </button>
        </div>
    @endforeach

    <br />
    <form wire:submit="save">
        <label for="label">Title:</label>
        <br />
        <input type="text" id="title" wire:model="title">
        <br />
        <textarea wire:model="content"></textarea>
        <br />
        <button type="submit">Save</button> <br />
        <span wire:loading>Saving...</span>
    </form>
</div>
