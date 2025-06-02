<?php

namespace App\Http\Controllers\public;

use App\Events\ContactFormEvent;
use App\Events\ContactFormSubmitted;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            return view('public.home');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

}
