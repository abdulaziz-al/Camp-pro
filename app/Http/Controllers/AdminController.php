<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camp;
use App\Reservation;

use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;




class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $files = Camp::orderBy('created_at','DESC')->paginate(30);

                        return view ('file.index',['files'=> $files]);
        
        }
        public function create(){
            return view('file.upload');
    
        }
    
        public function store(Request $request)
        {
            $messages = [
                'title.*'    => 'ضع اسم وعنوان الأستراحة',
                'decrabction.*'    => 'ضع وصف للأستراحة (غرفة , مسبح ...الخ ).',
                'price.*' => 'ضع سعر الليلة .',
                'file.*'      => 'لابد مو وجود صورة للأستراحة بنوع (png او jpg) ',
            ];
        
            $this->validate($request, [
                'title'=>'required',
                'decrabction'=>'required',
                'price'=>'required|integer',
                'file'=>'required|file|max:200000',
            ],$messages);


            $upload = $request->file('file');
            $title= $request->input('title');
            $decrabction=$request->input('decrabction');
            $price=$request->input('price');
            $path = $upload->store('public/storage');
            $file = Camp::create([
                'title'=>$title ,
                'decrabction'=> $decrabction,
                'price'=>$price,
                'path'=>$path
            ]);
            Alert::success('تمت إضافة الأستراحة',$request->input('title')) ;
            return redirect('/التحكم');
        }
    public function plus(Request $request )
    {

        $messages = [
            'salary.*'    => ' (80،20.....)لابد من وجود قيمة للزيادة ',

];
            $this->validate($request, [
                'salary'=>'required|integer'
            ],$messages);

        Camp::where('plus_price', '!=', null)
        ->update(['plus_price' => $request->input('salary')]);

      
       Alert::info('تمت الزيادة بنسبة %',$request->input('salary') );
                    return redirect()->back();
    }
    public function destroy($ids)
    {

        $delete = "delete";
        $img =  Camp::where('id','=',$ids)->first();
        $img->status = $delete;
        $img->save();
        Alert::info('تم حذف الاستراحة',$img->title) ;
        return redirect()->back();

    }
    public function view($id)
    {

        $view =  Reservation::all()->where('camp_id','=',$id);
       
        return view('file.viewcamp')->with('view',$view);

    }
}
