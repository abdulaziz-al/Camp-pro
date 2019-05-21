@if ($errors->any())

<div style="text-align: right">
<div class="alert alert-danger">


    <button type="button" class="close" data-dismiss="alert" > </button>
        <strong style="font-size: 20px"> خطاء</strong>
        <br/>
 <div>    
    @foreach($errors->all() as $error)
  {{$error}}
<br/>

    @endforeach
    
</div>
</div>
</div>
    @endif