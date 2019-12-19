@extends('layout.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <h1 class="text-left">Books Library</h1><br><br>
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Books You have been added</h2>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($book as $book)
                                    <li class="list-group-item">
                                         
                                    <img class=" rounded float-right" style="width:20%; height:30%" src="{{ asset('/upload/'.$book->cover)}}" alt="cover" >
                                        <h4 class="pull-left"><i>{{  $book->name }}</i></h4>
                                        by <b class="pull-right">{{$book->author}}</b><br>
                                        <i>{{$book->price}}</i> Kyats <br>
                                        (Category - {{$book->category['name']}}) 

                                        <br><br>
                                        <p> {{ substr($book->description, 0, 283) }}......<a href="{{url('/detail/'.$book->id)}} ">Read more</a></p>
                                        
                                        <a href="{{url("/editbook/$book->id")}}" class="btn btn-info">Edit</a>
                                        <a href="{{url("/deletebook/$book->id")}}" class="btn btn-danger">Delete</a>
                                        
                                    </li>
                                @endforeach
                             </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{url('/addbook')}}" class="btn btn-primary">Add New Book</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection