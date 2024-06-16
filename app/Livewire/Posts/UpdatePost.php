<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Component;

class UpdatePost extends Component
{
    public PostForm $form;

    public function mount(Post $post)
    {
        $this->form->setPost($post);
    }

    public function update()
    {
        $this->form->update();

        session()->flash('status', 'Post successfully updated.');
        return $this->redirect('/posts', navigate: true);
    }

    public function render()
    {
        return view('livewire.posts.update-post');
    }
}
