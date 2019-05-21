@extends('layouts.app')
@section('content')

<div class="container">
        @include('layouts.errmsg')
    
    <div class="row">

        <div class="col-md-6 col-md-offset-4">
            <div class="card">

                <h5 Class="card-header">اضافة استراحة</h5>
                <div class ="card-body">
                <form action="{{route('uploadfile')}}" method="post" enctype="multipart/form-data" 
                name="formName">
                @csrf
                <div class="form-group">
                    <label for="class">عنوان   </label>
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}"placeholder="title....">
                </div>
                <div class="form-group">
                    <label for="class">وصف   </label>
                    <input type="text" class="form-control" name="decrabction" id="decrabction" value="{{old('decrabction')}}"placeholder="decrabction....">
                </div>
                <div class="form-group">
                    <label for="class">السعر   </label>
                    <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}"placeholder="price....">
                </div>
                <div class="form-group">

                    <input type="file" name="file" > 

                    </div>
                    
                    <button type="submit" class="btn btn-primary">إضافة </button>
                    <a href="{{route('viewfile')}}" class ="btn btn-success">عودة</a>
                </form>
                </div>
                </div>
                </div>
                </div>
                </div>

@endsection