@extends('layouts.app')
    @section('content')

    <div class="col-sm-5">
                    


@foreach ($phone as $phones)
<div class="card">


        @foreach ($img as $imgs)
            @if($imgs->id == $phones->camp_id && $imgs->status =="ready")
        <img class="card-img-top" src="{{Storage::url($imgs->path)}}" style= "height: 5cm">
       

        <div class ="card-body">
                <div style="text-align: right">

            <div style="width: 100%">
          العنوان :  <strong class="card-title">{{$imgs->title}} </strong>  
        <br/>
        الوصف  :   <strong class="card-title">{{$imgs->decrabction}}</strong>
        <br/>
       

         <div style="width: 100%">

                سعر الليلة :   <strong class="card-title">{{$phones->price}}</strong>
          <br/>

            الاسم :  <strong class="card-title">{{$phones->name}} </strong>  
          <br/>
          رقم الهاتف   :   <strong class="card-title">{{$phones->phone}}</strong>
          <br/>
            تاريخ الحجز  :   <strong class="card-title">{{$phones->date}}</strong>
                <br/>
            </div>
       
            
    </div>
</div>

<br/>
</div>
@elseif($imgs->id == $phones->camp_id&& $imgs->status !="ready")
 <strong style="color: red" >العنوان :   {{$imgs->title}} 
 تم حذفها نأسف لذلك   </strong>
@endif
@endforeach

@endforeach

</div>

@endsection