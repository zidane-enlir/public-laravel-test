<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->user = new User;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user_profile.show')
                ->with('user', $this->user->getIdenticalUser($id));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user_profile.edit')
                ->with('user', $this->user->getIdenticalUser($id));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return view('user_profile.show')
                ->with('user', $this->user->getIdenticalUser($id));
    }
    
}
