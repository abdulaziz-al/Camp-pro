@extends('layouts.app')
    @section('content')

       

                
           
          <div style="text-align: right">
 
          <div style="width: auto">
               <table class="table">
                        <thead style="background-color: red">
                            
                          <tr style="color: white">
                            
                                <th>القيمة </th>
                                <th>الموعد </th>
                            <th>رقم الهاتف </th>
                            <th>اسم المستأجر</th>
                          
                          </tr>
                        </thead>

                        @foreach($view as $views)
                        
                       
                       
             
         
                        <tr>
                                <td>{{$views->price}}</td>
                                <td> {{$views->date}}</td>

                          <td> {{$views->phone}}</td>
                          <td>{{$views->name}}</td>


                        </tr>
                      

                      @endforeach
                    </table>
          </div>
           
        </div>
     
        @endsection


        

     
      


        
        
        