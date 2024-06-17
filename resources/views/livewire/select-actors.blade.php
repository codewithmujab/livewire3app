<div>
    <!-- Select Actors -->
    <button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers" data-dropdown-placement="bottom"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button"> YOUR BEST ACTOR </button>

    <!-- Dropdown menu Actors -->
    <select wire:model.live="theActor" class="h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200"
        aria-labelledby="dropdownUsersButton">
        <option value="0"> Choose your actor </option>
        @foreach ($actors as $id => $actor)
            <option value="{{ $id }}">
                {{ $actor }}
            </option>
        @endforeach
    </select>

    <!-- ******************* -->

    <!-- Select Best Movies -->
    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">SHOW BEST MOVIES </button>

    <!-- Dropdown menu Movies-->
    <select wire:model.live="theMovie" wire:key="{{ $theActor }}"
        class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        @if ($movies->count() == 0)
            <option value="">
                No movies found
            </option>
        @endif
        @foreach ($movies as $movie)
            <option value=" {{ $movie->id }} ">
                {{ $movie->name }}
            </option>
        @endforeach
    </select>
</div>
