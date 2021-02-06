<?php


namespace App\Http\Controllers;


use App\Http\Requests\UserCreateRequest;
use App\Mail\UserEmail;
use App\Models\User;
use App\Process\UserActivate;
use App\Process\UserCreate;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function registration()
    {
        return view('registration');
    }

    public function list()
    {
        $users = User::all();
        return view('list', compact('users'));
    }

    public function store(UserCreate $process, UserCreateRequest $request)
    {
        $properties = $process->handle($request->all());
        return redirect($properties->action)->withErrors($properties->errors);
    }

    public function activated(UserActivate $process, string $token)
    {
        $properties = $process->handle($token);
        return redirect('user-list')->with($properties->toArray());
    }

}
