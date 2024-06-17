<div>
    {{-- <div class="bg-green-300" wire:offline.class.remove="bg-green-300"> --}}
    <span>Author : {{ $author }}</span> <br />

    {{-- search --}}
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model.live="searchPost" type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Search Post..." required="">
                </div>
            </form>
        </div>
        {{-- <div>
            <select wire:model="searchAuthor"
                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option value="0">Choose one Author</option>
                @foreach ($authors as $id => $author)
                    <option value="{{ $id }}"> {{ $author }} </option>
                @endforeach
            </select>
        </div> --}}
    </div>
    {{-- end search --}}

    @forelse ($posts as $post)
        <div wire:key="{{ $post->id }}">
            {{--  <livewire:show-post :$post :key="$post->id" />  --}}
            {{-- data --}}
            <span class="font-bold text-blue-500">{{ $post->title }}</span> <br />
            {{ $post->content }} <br />
            {{ $post->created_at }}
            <br />
            @if (Auth::user()->email == 'saefulmujab300@gmail.com')
                <button type="button" class="text-red-500 underline" wire:click="deletePost({{ $post->id }})"
                    wire:confirm.prompt="YAKIN AKAN MENGHAPUS INI?\n\nKetik YA untuk benar menghapus.|YA">
                    Delete
                </button>
            @endif
        </div>
    @empty
        <div class="flex justify-center">
            No post were found.
        </div>
    @endforelse
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
