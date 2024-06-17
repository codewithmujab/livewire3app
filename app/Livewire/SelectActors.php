<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Actor;
use App\Models\Film;
use Illuminate\Support\Collection;

class SelectActors extends Component
{
    public Collection $actors;

    public Collection $movies;

    public int $theActor;

    public int $theMovie;

    public function mount(): void
    {
        $this->actors = Actor::pluck('name', 'id');

        $this->movies = collect();
    }

    public function updatedTheActor($value)
    {
        $this->movies = Film::where('actor_id', $value)->get();

        $this->theMovie = $this->movies->first()->id;
    }

    public function render()
    {
        return view('livewire.select-actors');
    }
}
