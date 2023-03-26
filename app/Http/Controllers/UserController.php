<?php

namespace App\Http\Controllers;


use App\Models\GroupRequest;
use App\Models\Group;
use App\Models\Tweet;
use App\Models\User;
use Auth;
use Symfony\Componet\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();
        $approved_requests = GroupRequest::where('user_id', $user->id)
                                         ->where('status', 'approved')
                                         ->get();

        return view('users.show', [
            'user' => $user,
            'approved_requests' => $approved_requests
        ]);
    }
}
