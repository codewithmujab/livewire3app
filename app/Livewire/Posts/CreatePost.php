<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreatePost extends Component
{
    public $title;
    public $content;

    public function save()
    {
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        return redirect()->to('/posts')
            ->with('status', 'Post created!');
    }

    #[Title('Create Post')]
    public function render()
    {
        return view('livewire.posts.create-post')->with([
            'author' => Auth::user()->email,
            'posts' => Post::all(),
        ]);
    }
}
