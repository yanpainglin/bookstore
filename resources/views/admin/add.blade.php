@extends('layout.app');

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
             
                <h1 class="text-center">Add New Book</h1>

                <div class="card card-default">
                    <div class="card-header">
                        <h3>Add Book</h3>
                    </div>
                    <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                 <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                        <form action="{{url('/storebook')}}" method="POST" enctype="multipart/form-data" >
                        @csrf

                            <div class="form-group">
                                <input type="text" name="name" placeholder="Title " class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="author" placeholder="Author"  class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="integer" name="price" placeholder="Price"  class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="description" placeholder="Description"  cols="4" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                            <select class="form-control" name="category_id">
                                <option value="0" >Choose Category</option>
                                @foreach($book as $category)
                                    <option value="{{$category->id}}" required>{{$category->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="cover">Cover Image</label><br>
                                <input type="file" name="cover"  >
                            </div>
                            <button class="btn btn-primary" type="submit">Add Book</button>
                            <a href="{{url('/viewbooks')}}" class="btn btn-secondary">Cancel</a>
                        </form>
                </div>
                    </div>
                 
                 
                    
            </div>
        </div>
    </div>
@endsection