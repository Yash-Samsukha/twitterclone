<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $idea = idea::orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            $idea = $idea->where('content', 'like', '%' . request()->get('search', '') . '%');
        }
        dump(idea::all());
        return view('dashboard'
            , [
                'ideas' => $idea->paginate(5)
            ]
        );
    }


}
