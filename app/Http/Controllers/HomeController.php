<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camp;
use App\Reservation;
use RealRashid\SweetAlert\Facades\Alert;

;
class HomeController extends Controller
{
  public function index()
    {
        $files = Camp::orderBy('created_at','DESC')->paginate(30);
        return view ('home',['files'=> $files]);
            }


            public function reservation($id){

             $files = Camp::all()->where('id',$id);

                return view('file.reservation',['files'=> $files]);
            }



            public function showinfo(Request $request){
                


                $messages = [
                    'phone.*'    => 'أدخل رقم الهاتف مثل ( 05XXXXXXXX)',
                    
                ];
            
                $this->validate($request, [
                    'phone'=>'required|regex:/(05)[0-9]{8}/',
                    
                ],$messages);

                $phone = Reservation::all()->where('phone',$request->input('phone'));
                $img = Camp::all();

                $arrUserinfo= Array('phone' => $phone , 'img'=>$img );

                return view ('file.userinfo')->with($arrUserinfo);




               


            }

            public function store(Request $request ,$id){





                $messages = [
                    'name.*'    => 'يجب ادخال إسم المستأجر (محمد,أحمد) ',
                    'phone.*'    => 'أدخل رقم الهاتف مثل ( 05XXXXXXXX)',
                    'selectdates.*' => 'حدد يوم الحجز    .',
                    
                ];
            
                $this->validate($request, [
                    'name'=>'required',
                    'phone'=>'required|regex:/(05)[0-9]{8}/|max:10',
                    'selectdates'=>'required|date',
                    
                ],$messages);

                $see = Reservation::all();
                $date = $request->input('date') ;


                if (Reservation::where('date', $request->input('selectdates'))->
                where('camp_id',$id)->exists())
                {
                    Alert::error('تم حجز هذا اليوم ',$request->input('selectdates') );
                    return redirect()->back();

                }else {


                $date= $request->input('selectdates');

                $salary = Camp::where('id',$id)->first();
                $plus = $salary->plus_price/100*$salary->price+$salary->price ;
                $camp =  new Reservation ;
                $camp->name  = $request->input('name');
                $camp->phone = $request->input('phone');
                $camp->date = $request->input('selectdates');
                $camp->price = $plus;
                $camp->camp_id = $id;
                $camp->save();
                $phone = $camp->phone;
                $camps = reservation::all();
                Alert::success('رقم الاشتراك الخاص بك ', $phone);
                return redirect('/');
                }
        
            }


            
}
