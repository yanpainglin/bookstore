@extends('layout.app')

@section('content')

    <div class="container-fluid ">
        <div class="card card-default">
            <div class="card-header bg-secondary"><h1>Book Store</h1> </div>
            <div class="card-body bg-secondary">
            <div class="row" >
            <div class="col-md-3">
                <div class="card card-default bg-secondary">
                    <div class="card-header">
                        <h3 class="text-center" style="color:#fff" >Categories</h3>
                         
                        <ul class="list-group" id="category">
                            <li class="list-group-item bg-secondary text-center">
                                <a class="active-menu-link" href="{{ url('bookstore/')}}" style="color:bisque" class="btn">All Books({{count($book)}})</a>
                            </li>
                            @foreach($cat as $cats)
                                <li class="list-group-item bg-secondary text-center">
                                    <a href="{{url('bookstore/'.$cats->id)}}" style="color:bisque" class="btn">{{$cats->name}}({{count($cats->book)}})</a>
                                </li>
                            @endforeach
                        </ul>
                          
                    </div>
                </div>
            </div>
             
            <div class=" col-md-9 bg-dark">
            <ul class="books list-group">
                <div class="row">
                    
                        @foreach($book as $book)
                            <div class=" col-md-2">                       
                                <li class="list-group-item mb-4 mt-4">
                                    <a href="{{url('detailofbook/'.$book->id)}}">
                                        <img class="rounded mx-auto d-block img-thumbnail" style="width:100%;height:auto;" src="{{ asset('/upload/'.$book->cover)}}" alt="cover" > 
                                    </a>
                                    <h5 class="text-center"><i>{{  $book->name }}</i></h5>
                                    <b class="text-center d-block">{{$book->author}}</b>
                                    <i class="text-center d-block">{{$book->price}} Kyats</i>  
                                    <center>
                                    <a href="{{url('addtocart/'.$book->id)}}" class="btn btn-small bg-warning text-center">Add to Cart</a>
                                    </center>
                                </li>
                            </div>                                 
                        @endforeach

                        
                    
            </div>
            </ul>
        </div>
         
         
        </div>
            </div>
            <div class="card-footer text-center ">
               &copy; <?php echo date('Y') ?> All right reserved.
            </div>
        </div>
    </div>
         

@endsection