@extends('layouts.app')
@section('content')



@include('layouts.errmsg')
@include('sweetalert::alert')


<div class="userphone">

            <form action="{{route('pulsSalary')}}" method="post"> 
                @csrf
                <div  class="fas fa-plus" title="الزيادة الموسمية">
                <input type="text" name="salary" id="salary"
                value="{{old('salary')}}"></div>
                <button type="submit" class="btn btn-warning" name="sal">  
                ادخل نسبة الزيادة    </button>
            </form>
   </div>


   

    <div class="display01">
            <p>
                    <a href="{{route('formfile')}}" class="btn btn-outline-primary">إضافة استراحة جديدة </a>
                </p>

    <div class="row">
        
        @foreach($camps as $camp)
                @if($camp->status == "ready")
        
                <div class="col-sm-5">
                    
                    <div class="card">

                        <img class="card-img-top" src="{{Storage::url($camp->path)}}" style= "height: 5cm">
                        <div class ="card-body">
                                <div style="text-align: right">

                            
                          العنوان :  <strong class="card-title">{{$camp->title}} </strong>  
                        <br/>
                        الوصف  :   <strong class="card-title">{{$camp->decrabction}}</strong>
                        <br/>
                         سعر الليلة :   <strong class="card-title">{{$camp->price}} +  % {{$camp->plus_price}} </strong>
                                <br/>

                   
                   
                        <p class="card-text">{{$camp->created_at->diffForHumans()}}</p>


                        <div >
                        <a href="{{route('view',$camp->id)}}" class ="btn btn-warning"> الحجوزات </a>

                    <form action="{{route('delete',$camp->id)}}" method="post"> 
                        @csrf

                        <button type="submit" class="btn btn-danger" name="del"> حذف </button>

                    </form>
                        </div>

                    

               </div>
              
            </div>
                
                </div>
                </div>
    @else
    
    
    @endif
        @endforeach
    </div>

    </div>


@endsection


