<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $histories = auth()->user()->workoutSchedules()
            ->completed()
            ->orderBy('completed_at', 'desc')
            ->paginate(10);
        
        return view('history.index', compact('histories'));
    }
}