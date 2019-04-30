<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{

  public function load(){
    $undonetasks= Task::where('status', 'undone')->get();
    $donetasks= Task::where('status', 'done')->get();
    $tasks=array();
    $tasks['undonetasks']=$undonetasks;
    $tasks['donetasks']=$donetasks;
    return view('tasks')->with('tasks',$tasks);
  }
  public function create(Request $request){
    $task = new Task;
    $task->name =$request['name'];
    $task->status= "undone";
    $task->save();
    return redirect('/');
  }

  public function done(Request $request){
    $task = Task::where('id', $request['id'])->first();
    $task->status = 'done';
    $task->save();
  }
  public function undone(Request $request){
    $task = Task::where('id', $request['id'])->first();;
    $task->status = 'undone';
    $task->save();
  }

}
