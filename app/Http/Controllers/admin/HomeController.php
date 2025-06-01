<?php

namespace App\Http\Controllers\admin;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        try {
            return view('admin.home');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
