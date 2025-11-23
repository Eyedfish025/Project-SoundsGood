<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    public function store(Request $request)
    {
        $user = $request-> all();
        $user ['password'] = bcrypt ($request -> password);
        $user = User::create($user);

        auth::login($user);

        // Redirecionar para página inicial após cadastro
        return redirect('/index');
    }
}
