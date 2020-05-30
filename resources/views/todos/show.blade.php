@extends('layouts.app')
@section('title','todo - '. $todo->id)
    
@section('content')
    
    <div class="contailer">
        <h1 class="mt-5 text-center">
            {{$todo->title}}
        </h1>
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8">
                <div class="card-header">
                    <span>
                        Details
                    </span>
                    <span class="badge badge-warning float-right">{{boolval($todo->completed)? 'completed':'not-completed'}} </span>
                </div>
                <div class="card-body">
                    {{$todo->description}}
                </div>
            </div>
        </div>
    </div>

    @endsection