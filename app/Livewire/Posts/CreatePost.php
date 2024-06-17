<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Livewire\Forms\PostForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\WithFileUploads;
use Illuminate\Database\Eloquent\Builder;

class CreatePost extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    public PostForm $form;

    public string $searchPost = "";

    public function mount(Post $post)
    {
        $this->form->setPost($post);
    }

    public function save()
    {

        //$this->image->storeAs('public/posts', $this->image->hashName());
        $this->form->image->storeAs(path: 'public/posts', name: $this->form->image->hashName());

        $this->form->store();

        session()->flash('status', 'Post successfully created.');
        // return $this->redirect('/posts', navigate: true);
    }

    public function deletePost($id)
    {
        if (!Auth::user()->email == 'saefulmujab300@gmail.com') {
            abort(403);
        }

        $this->delete($id);
    }

    // lebih aman karena protected
    protected function delete($postId)
    {
        $post = Post::find($postId);
        $post->delete();
    }

    #[Title('Create Post')]
    public function render()
    {
        $posts = Post::when($this->searchPost !== '', fn (Builder $query) => $query->where('title', 'like', '%' . $this->searchPost . '%'))
            ->latest()->cursorPaginate(6);

        return view('livewire.posts.create-post')->with([
            'author' => Auth::user()->email,
            'posts' => $posts
        ]);
    }

    public function updating($key): void
    {
        if ($key === 'searchPost') {
            $this->resetPage();
        }
    }
}
