@extends('layouts.app')
@section('title','All todos')
    
@section('content' )
    
<div class="container">
    <div class="row pt-3 justify-content-center">
        <div class="card" style="width: 50%">
            <div class="card-header text-center">
                <h1>All to-dos</h1>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
               
            @endif
            <div class="card-body">
                <ul class="list-group">
                @forelse($todos as $todo)
            <li class="list-group-item text-muted">{{$todo->title}}
            <span class="float-right">
                <a href="/todos/{{$todo->id}}/delete" style="color: rebeccapurple">
                    <i class="fas fa-trash" aria-hidden="true"></i>                             
                </a>
            </span>

            <span class="float-right mr-2" >
                <a href="/todos/{{$todo->id}}/edit" style="color: rebeccapurple">
                    <i class="far fa-edit"></i>                            
                </a>
            </span>

            <span class="float-right mr-2">
                <a href="/todos/{{$todo->id}}" style="color: rebeccapurple">
                    <i class="fas fa-eye"></i>                             
                </a>
            </span>
           @if (!$todo -> completed)
           <span class="float-right mr-2">
            <a href="/todos/{{$todo->id}}/complete" style="color: rebeccapurple">
                <i class="fas fa-check"></i>                             
            </a>
        </span>
           @endif

   
            </li>
            @empty
                <p class="text-center">No to-do</p>
                @endforelse

                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
    