<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Comments extends Component
{
    // public $initialcomments;    
    public $newComment;

    use WithPagination;

    // public function mount()
    // {
    //     $initialcomments  =  \App\Models\Comments::latest()->get();

    //     // dd($initialcomments);
    //     $this->fetchinitialcomments = $initialcomments;

    // }

    public function updated($field)

    {

        $this->validateOnly($field, ['newComment' => 'required|max:255']);

    }

    public function addComment(){
        $this->validate(['newComment' => 'required|max:255']);
        $createdComment  =  \App\Models\Comments::create(['body' => $this->newComment, 'user_id'=>1]);
        
        $this->newComment = "";

        session()->flash('message', 'Comment successfully created.');
    }

    public function remove ($commentId){
        $comments = \App\Models\Comments::find($commentId);
        $comments->delete();

        session()->flash('message', 'Comment successfully deleted.');
    }

    public function render()
    {
        return view('livewire.comment', [
            'fetchinitialcomments' => \App\Models\Comments::latest()->paginate(1),

        ]);
    }
}
