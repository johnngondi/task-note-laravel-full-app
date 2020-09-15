<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\NoteResource;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{

    public function index()
    {
        $notes = Auth::user()->notes;
        return response(NoteResource::collection($notes));
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

        $res = [
            'message' => 'Note Created Successfully',
            'data' => $note
        ];

        return response(new NoteResource($res), 201);
    }


    public function show(Request $request)
    {
        $note = Note::find($request->note);

        //check if the note exists or not then return it
        if (!$this->check($note)){
            return response(new NoteResource($note));
        } else {
            return $this->check($note);
        }
    }


    public function update(Request $request)
    {
        $this->validateNote();

        $note = Note::find($request->id);

        //check if the note exists or not then return it
        if ($this->check($note)){
            return $this->check($note);
        }

        $note->title = $request->title;
        $note->body = $request->body;
        $note->category = $request->category;
        $note->update();

        $res = [
            'message' => 'Note Updated Successfully',
            'data' => $note
        ];

        return response(new NoteResource($res));
    }

    public function changeCategory(Request $request)
    {
        $note = Note::find($request->note);

        //check if the note exists or not then return it
        if ($this->check($note)){
            return $this->check($note);
        }

        $note->category = $request->category;
        $note->update();

        return response(['message' => 'Note updated Successfully']);
    }


    public function destroy(Request $request)
    {
        $note = Note::find($request->note);

        //check if the note exists or not then return it
        if ($this->check($note)){
            return $this->check($note);
        }

        $note->delete();

        return response(['message' => 'Note Deleted']);
    }

    public function validateNote()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
    }

    public function check($obj)
    {
        if (!$obj){
            return $this->return404();
        }

        if ($obj->user_id != Auth::user()->id){
            return $this->return401();
        }

        return false;
    }

    public function return404()
    {
        return response(['message' => 'Note does not exist'], 404);
    }

    public function return401()
    {
        return response(['message' => 'Unauthorized Access'], 401);
    }
}
