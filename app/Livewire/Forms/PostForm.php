<?php

namespace App\Livewire\Forms;

// use Livewire\Attributes\Validate;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\Post;
// use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class PostForm extends Form
{
    //
    public ?Post $post;

    //image
    #[Rule('required', message: 'Masukkan Gambar Post')]
    #[Rule('image', message: 'File Harus Gambar')]
    #[Rule('max:1024', message: 'Ukuran File Maksimal 1MB')]
    public $image;

    //title
    #[Rule('required', message: 'Masukkan Judul Post')]
    public $title;

    //content
    #[Rule('required', message: 'Masukkan Isi Post')]
    #[Rule('min:3', message: 'Isi Post Minimal 3 Karakter')]
    public $content;

    // public function rules()
    // {
    //     return [
    //         'title' => [
    //             'required',
    //             Rule::unique('posts')->ignore($this->post),
    //         ],
    //         'content' => 'required|min:5',
    //     ];
    // }

    public function setPost(Post $post)
    {
        $this->post = $post;

        $this->image = $post->image;

        $this->title = $post->title;

        $this->content = $post->content;
    }

    public function store()
    {
        $this->validate();

        Post::create($this->only(['title', 'content', 'image']));

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->post->update($this->all());

        $this->reset();
    }
}
