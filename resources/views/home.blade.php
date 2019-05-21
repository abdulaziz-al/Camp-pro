@extends('layouts.app')
    @section('content')
    @include('sweetalert::alert')
    @include('layouts.errmsg')


       
        <title>أستراحات و لا اأحلى </title>

     
      

     
         
        <div class="userphone">
            <form action="{{route('showinfo')}}" method="post"> 
                @csrf
    
                <div class="form-group">
                        <div class="fas fa-tty" title="رقم الجوال">
                    <input type="text" name="phone" id="phone"
                     value="{{old('phone')}}">  <label for="name"> ادخل رقم الاستراك   </label>
                        </div>
                
                
                
                
                
                    </div>
            </form>
            </div>
                    
        <div class="display01">
        

    
            <div class="row">
                
                @foreach($files as $file)
                @if($file->status == "ready")
        
                <div class="col-sm-5">
                    
                    <div class="card">

                        <img class="card-img-top" src="{{Storage::url($file->path)}}" style= "height: 5cm">
                        <div class ="card-body">
                                <div style="text-align: right">

                            
                          العنوان :  <strong class="card-title">{{$file->title}} </strong>  
                        <br/>
                        الوصف  :   <strong class="card-title">{{$file->decrabction}}</strong>
                        <br/>
                         سعر الليلة :   <strong class="card-title">{{$file->plus_price/100*$file->price+$file->price}}</strong>
                                <br/>
                            
                        <a href="{{route('reservation',$file->id)}}" class="btn btn-warning" 
                             style="width: 100%"> أحجز </a>
                            
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


        

     
      


        
        
        