@extends('layout.app');

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
             
                <h1 class="text-center">Edit Book</h1>

                <div class="card card-default">
                    <div class="card-header">
                        <h3>Edit Book</h3>
                    </div>
                    <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                 <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                        <form action="{{url("/updatebook/$book->id")}}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group">
                                <input type="text" name="name" placeholder="Title " class="form-control" value="{{$book->name}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="author" value="{{$book->author}}" placeholder="Author"  class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="integer" name="price" placeholder="Price" value="{{ $book->price}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="description" placeholder="Description"  cols="4" rows="15" class="form-control">{{$book->description}}</textarea>
                            </div>
                            <div class="form-group">
                            <select class="form-control" name="category_id" >
                                    <option value="0" >Choose Category</option>
                                    @foreach($category as $category)
                                        <option value="{{$category->id}}" @if($book->category_id == $category->id) selected @endif >{{$category->name}}</option>
                                    @endforeach
                            </select>
                            </div>
                         
<br>
                            <img class=" rounded " style="width:10%;" src="{{ asset('/upload/'.$book->cover)}}" alt="{{$book->cover}}" > <br><br>
                            <div class="form-group">
                            <label for="cover">Cover Image</label><br>
                                <input type="file" name="cover">
                            </div>
                            <button class="btn btn-primary" type="submit">Update Book</button>
                        </form>
                </div>
                    </div>
                 
                 
                    
            </div>
        </div>
    </div>

    
@endsection