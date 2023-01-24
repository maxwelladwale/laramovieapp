<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $form = [
        'email'   => '',
        'password'=> '',
    ];

    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email',
            'form.password' => 'required',
        ]);

        // dd($this->form);

       if (Auth::attempt($this->form)) {
        return redirect(route('index'));

       } else{
        return redirect(route('login'));

       }
    }

    public function render()
    {
        return view('livewire.login');
    }
}