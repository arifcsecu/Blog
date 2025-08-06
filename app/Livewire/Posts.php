<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Posts extends Component
{

    use WithPagination;

    public $title, $body, $postID, $search = ' ', $postAdd = false, $postUpdate = false;

    public function addPost()

    {
        $this->postAdd = true;
        $this->postUpdate = false;
    }

    public function cancel()
    {
        $this->postAdd = false;
        $this->postUpdate = false;
    }

    public function resetfields()
    {
        $this->title = " ";
        $this->body = " ";
    }

    public function storePost()
    {
        $this->validate([
            "title" => "required",
            "body" => "required"
        ]);
        Post::create([
            "title" => $this->title,
            "body" => $this->body
        ]);

        session()->flash("creation-message", "Post Created Successfully!!");

        $this->postAdd = false;
        $this->postUpdate = false;
        $this->resetfields();
    }

    public function editPost($id)
    {
        $post = Post::find($id);

        $this->title = $post->title;
        $this->body = $post->body;

        $this->postID = $post->id;

        $this->postUpdate = true;
        $this->postAdd = false;
    }

    public function updatePost()
    {
        $this->validate([
            "title" => "required",
            "body" => "required"
        ]);

        $post = Post::find($this->postID);

        $post->title = $this->title;
        $post->body = $this->body;

        $post->save();

        session()->flash("update-message", "Post Updated Successfully!!");

        $this->postUpdate = false;
        $this->postAdd = false;
        $this->resetfields();
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        session()->flash("delete-message", "Post deleted Successfully!!");
    }



    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('body', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(3)
        ]);
    }
}
