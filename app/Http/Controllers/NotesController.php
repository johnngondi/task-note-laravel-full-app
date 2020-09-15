<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{

    public function index()
    {
        $notes = Note::where('user_id', Auth::user()->id)->latest()->get();

        return view('notes.index', [
            'notes' => $notes
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validateNote();
        $note = new Note();

        $note->title = $request->title;
        $note->body = $request->body;
        $note->category = $request->category;
        $note->user_id = Auth::user()->id;

        $note->save();

        return redirect(route('notes.show', $note));
    }


    public function show(Note $note)
    {
        if ($note->user->id != Auth::user()->id){
            return redirect(route('notes.index'));
        }
        return view('notes.show', [
            'note' => $note
        ]);
    }


    public function edit(Note $note)
    {
        //
    }


    public function update(Request $request, Note $note)
    {
        $this->validateNote();

        $note->title = $request->title;
        $note->body = $request->body;
        $note->category = $request->category;

        $note->update();

        return redirect(route('notes.show', $note));
    }


    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth::user()->id){
            return redirect(route('notes.index'));
        }

        $note->delete();

        return redirect(route('notes.index'));
    }

    public function validateNote()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
    }
}
