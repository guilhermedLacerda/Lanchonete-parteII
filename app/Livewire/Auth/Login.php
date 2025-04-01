<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];

    protected $messages = [
        'email.required' => 'email obrigatório',
        'email.email' => 'formato de email inválido',
        'password.required' => 'senha obrigatória',
        'password.min'=> 'senha deve conter 6 caracteres no mínimo'
    ];

    public function login(){
        $this->validate();

        if(Auth::attempt(['email'=>$this->email, 'password'=>$this->password])){
            session()->regenerate(); /* cria um cookie para dizer que vc está logado */
            if(Auth::user()->role === 'cliente') {
                return redirect()->route('cliente.dashboard');
            }

            /* Depois do login, ele vai chamar a rota */
        }

        session()->flash('error', 'Email ou senha incorretos'); /* flash é usado para colocar msg na tela */
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}