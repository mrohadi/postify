<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth'),
        ];
    }

    public function index()
    {
        return view('dashboard');
    }
}

