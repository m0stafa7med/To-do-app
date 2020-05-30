<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Todo;
use Illuminate\Auth\Events\Validated;

class todosController extends Controller
{
    public function index (){
       $todos= \App\Todo::all();
        return view ('todos.index',['todos'=>$todos]);
    }
    public function show(Todo $todo){
        return view('todos.show')->with('todo',$todo);
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(Request $request)
    {
       //return $request->all();
       
      // return $request->input('todoTitle');

      $request->validate([
        'todoTitle'=>'required|min:4',
        'todoDescription'=>'required'
    ]);


      $todo = new Todo();
      $todo->title = $request->todoTitle;
      $todo->description = $request -> input('todoDescription');
      $todo->save();
      $request->session()->flash('success','Todo created successfully');
      return redirect('/todos');
    }
    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo',$todo);
    }
    public function update(Request $request,Todo $todo )
    {
        
      $request->validate([
        'todoTitle'=>'required|min:4',
        'todoDescription'=>'required'
    ]);
    $todo->title =$request->get('todoTitle');
    $todo->description=$request->get('todoDescription');
    $todo->save();
    $request->session()->flash('success','To-do updated successfully');

      return redirect('/todos');
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        session()->flash('success','To-do deleted successfully');

        return redirect('/todos');
    }
    public function complete (Todo $todo)
    {
        $todo->completed =true;
        $todo->save();
        session()->flash('success','To-do completed successfully');
        
        return redirect('/todos');
       

    }
    
}
