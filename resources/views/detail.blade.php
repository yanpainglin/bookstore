@extends('layout.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                     
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>{{  $book->name }}</h2>
                        </div>
                        <div class="card-body">
                            
                               
                                  
                                         
                                    <img class=" rounded" style="width:20%; height:30%" src="{{ asset('/upload/'.$book->cover)}}" alt="cover" ><br><br>
                                        အမည် - <b>{{$book->name}} </b><br>
                                        စာရေးဆရာ - <b class="pull-right">{{$book->author}}</b><br>
                                        စျေးနှုန်း - <i>{{$book->price}}</i> Kyats <br>
                                        (အမျိုးအစား - {{$book->category['name']}}) 

                                        <br><br>
                                        <p>{{ $book->description }}</p>
                                        
                                     
                                        
                            
                             
                        </div>
                        <div class="card-footer">
                            <a href="{{url('/viewbooks')}}" class="btn btn-primary">Back to booklist</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection