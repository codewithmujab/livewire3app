<div>
    <div class="bg-green-300" wire:offline.class.remove="bg-green-300">
        <span>Author : {{ $author }}</span> <br />

        @foreach ($posts as $post)
            <div wire:key="{{ $post->id }}">
                {{-- data --}}
                <span class="font-bold text-blue-500">{{ $post->title }}</span> <br />
                {{ $post->content }} <br />
                {{ $post->created_at }}
                <br />
                @if (Auth::user()->email == 'saefulmujab300@gmail.com')
                    <button type="button" class="text-red-500 underline" wire:click="deletePost({{ $post->id }})"
                        wire:confirm="Are you sure you want to delete this post?">
                        Delete
                    </button>
                @endif
            </div>
        @endforeach
        {{ $posts->links(data: ['scrollTo' => false]) }}

        <br />
        <form wire:submit="save">
            @if ($this->form->image)
                <img src="{{ $this->form->image->temporaryUrl() }}">
            @endif

            <label class="fw-bold">GAMBAR</label>
            <input type="file" wire:model.blur="form.image">
            <div>
                @error('form.image')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <label for="label">Title:</label>
            <br />
            <x-input type="text" wire:model.blur="form.title" wire:dirty.class="bg-gray-100" />
            <div>
                @error('form.title')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <br />
            <textarea wire:model.blur="form.content"></textarea>
            <div>
                @error('form.content')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <br />
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">Save</button>
            <br />
            <span wire:loading>Saving...</span>
        </form>
    </div>
</div>
