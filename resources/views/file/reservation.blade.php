@extends('layouts.app')
    @section('content')
    @include('sweetalert::alert')
    @include('layouts.errmsg')

          <div class="container">

 @foreach($files as $file)
                

                            
                    <img  src="{{Storage::url($file->path)}}"  >
          </div>
                    
                  
                            <div class ="infocamp"><div class="fas fa-search-location" title="عنوان الاستراحة">
                          العنوان :  <strong >{{$file->title}} </strong>  </div>
                        <br/>
                        الوصف  :   <strong class="card-title">{{$file->decrabction}}</strong>
                        <br/><div  class="fas fa-coins" title="المبلغ">
                         سعر الليلة :   <strong class="card-title">{{$file->plus_price/100*$file->price+$file->price}}</strong>
                         </div>
                                <br/>
                      





                                <link rel="stylesheet" type="text/css" href={{ asset('css/jquery-ui.css')}}>
                                <script src={{ asset('js/jquery-1.12.4.js')}}></script>
                                <script src={{ asset('js/jquery-ui.js')}}></script>
                          
                         
                        <form action="{{route('saveinfo',$file->id)}}" method="post"> 
                            @csrf

                            <div class="form-group">
                                <div  class="fas fa-user" title="إسم المستأجر">
                                <input type="text" name="name" id="name"
                                 value="{{old('name')}}">  <label for="name"> اسم المستأجر </label>
                                </div>
                                </div>
                            <div class="form-group">
                               <div class="fas fa-tty" title="رقم الجوال">
                                <input type="text" name="phone" id="phone" 
                                value="{{old('phone')}}">     <label for="phone">  رقم الهاتف    </label>
                               </div>
                            </div>

                            

                            
                            <div class="form-group">
                               	<div class="far fa-calendar-alt" title="موعد الحجز">
                            <input type="text" name="selectdates" id="select_date" value="{{old('selectdates')}}" >  : اختار اليوم 
                               	</div>
                           
                           <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#select_date").datepicker({
                                        format:"dd/mm/yyyy",
                                        autoclose:true,
                                        todayHighlight:true,
                                        showOtherMonths:true,
                                        selectOtherMonths:true,
                                        autoclose:true,
                                        changeMonth:true,
                                        changeYear:true,
                                        minDate:new Date()
                                    });
                                });
                            </script>
                        <br/>
                        <br/>
                        </div>

                            <button type="submit" 
                            class="btn btn-info" 
                            style="width: 30%"> أحجز </button>

                        </form>











                            </div>

    
              

                @endforeach

               

               
              
        
        
        @endsection
        
        
        