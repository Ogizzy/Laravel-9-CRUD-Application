<?php

namespace App\Http\Controllers;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
   public function index()
   {
     $todo = Todo::all();
    return view('todo.index', [
      'todos'=>$todo]);
   }

   public function create()
   {
      return view('todo.create');
   }

   public function store(TodoRequest $request)
   {
      // $request->validated();
    Todo::create([
      'title'=> $request->title,
      'description' =>$request->description,
      'is_completed' => 0
    ]);

    $request->session()->flash('alert-success', 'Application Submitted Successfully');

    return to_route('todo.index');
   }


   public function show($id)
{
   $todo = Todo::find($id);
   if(! $todo) {
      return to_route('todo.index')->witherrors([
         'error'=>'unable to locate Todo'
      ]);
   }
   return view('todo.show', ['todo' =>$todo]);
}


public function edit($id)
{
   $todo = Todo::find($id);
   if(! $todo) {
      request()->session()->flash('error', 'unable to locate the Todo');
      return to_route('todo.edit')->witherrors([
         'error'=>'unable to locate Todo'
      ]);
   }
   return view('todo.edit', ['todo' =>$todo]);
}

public function update(TodoRequest $request)
{
   
   $todo = Todo::find($request->todo_id);

   if(! $todo) {
      request()->session()->flash('error', 'unable to locate the Todo');
      return to_route('todo.index')->witherrors([
         'error'=>'unable to locate Todo'
      ]);
   }
   
   $todo->update([
      'title'=>$request->title,
      'description'=>$request->description,
      'is_completed'=>$request->is_completed,
   ]);
   $request->session()->flash('alert-info', 'Application Updated Successfully');
   return to_route('todo.index');
}

public function  destroy(Request $request)
{

   $todo = Todo::find($request->todo_id);

   if(! $todo) {
      request()->session()->flash('error', 'unable to locate the Todo');
      return to_route('todo.index')->witherrors([
         'error'=>'unable to locate Todo'
      ]);
   }
  $todo->delete();
  request()->session()->flash('alert-success', 'Todo Deleted Sucessfully');

  return to_route('todo.index');
}
 
}
