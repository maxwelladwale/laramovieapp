<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\WithFileUploads;
class Comments extends Component
{
    // public $initialcomments;    
    public $newComment;

    use WithPagination;
    use WithFileUploads;


    public $photo;
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
        // $this->file->store('files', 'public');
        $this->storeImage();

        $createdComment  =  \App\Models\Comments::create(['body' => $this->newComment, 'image'=> $this->photo->getClientOriginalName(), 'user_id'=>1]);
        

        $this->newComment = "";
        $this->photo = "";

        session()->flash('message', 'Comment successfully created.');
    }

    public function remove ($commentId){
        $comments = \App\Models\Comments::find($commentId);
        $comments->delete();

        session()->flash('message', 'Comment successfully deleted.');
    }



    public function savephoto()

    {

        $this->validate([

            'photo' => 'image|max:1024', // 1MB Max

        ]);

        $php =$this->photo;
        // dd($php);
        $this->photo->store('photos');

    }

    public function storeImage(){
        if (!$this->photo) {
            return null;
        }
        // dd($this->photo->getClientOriginalName());
        $filename = $this->photo->getClientOriginalName();
        $this->photo->storeAs('files',  $filename);
        
    // Storage::disk('local')->put($path, file_get_contents($request->file));
    }


    public function render()
    {
        return view('livewire.comment', [
            'fetchinitialcomments' => \App\Models\Comments::latest()->paginate(10),

        ]);
    }
}
