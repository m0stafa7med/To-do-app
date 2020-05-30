@extends('layouts.app')
@section('title','create Todo')
    
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <div class="cold-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>
                            create a new to-do
                        </h1>
                    </div>
                    <div class="card-body">
                                           {{-- @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif  --}}
                        <form action="/create" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter to-do title" name="todoTitle" class="@error('todoTitle') is-invalid @enderror" value="{{old('todoTitle')}}">
                            </div>
                            @error('todoTitle')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <textarea class="form-control" rows="3"  placeholder="Enter description" class="@error('todoDescription') is-invalid @enderror" name="todoDescription"></textarea>
                            </div>
                            @error('todoDescription')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" style="width: 40%">Create</button>
                            </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection