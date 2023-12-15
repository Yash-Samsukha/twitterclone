<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
     $validated =   request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        $validated['user_id']=auth()->id();
        $idea = idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created Successfully!');

    }

    public function destroy(idea $idea)
    {
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea Deleted Successfully!');
    }

    public function show(Idea $idea)
    {


        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {

            if(auth()->id() !== $idea->user_id){
                abort(404);
            }
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
    if(auth()->id() !== $idea->user_id){
        abort(404);
    }
        $validated=request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea Updated Successfully');
    }

}
