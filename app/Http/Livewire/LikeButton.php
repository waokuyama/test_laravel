<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Like;

class LikeButton extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function like()
    {
        $like = new Like();
        $like->post_id = $this->post->id;
        $like->user_id = auth()->user()->id;
        $like->save();
    }

    public function unlike()
    {
        $like = Like::where('post_id', $this->post->id)
                    ->where('user_id', auth()->user()->id)
                    ->first();

        if ($like) {
            $like->delete();
        }
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
