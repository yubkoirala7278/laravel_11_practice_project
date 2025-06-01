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

    public function about()
    {
        try {
            return view('admin.about');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function store(Request $request)
    {
        $user = User::create($request->except('_token'));

        // Find all admins
        $admins = User::where('is_admin', 1)->get();

        // Create notification for each admin
        foreach ($admins as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'message' => "<strong>{$user->name}</strong> {$user->email} has been created",
            ]);
        }

        // Broadcast the event
        event(new UserCreated($user));

        return back()->with('success', 'User created successfully.');
    }


    public function markAsRead(Request $request)
    {
        // Mark all notifications for the authenticated user as read
        Auth::user()->notifications()->update(['read' => true]);

        return response()->json(['success' => true]);
    }
}
