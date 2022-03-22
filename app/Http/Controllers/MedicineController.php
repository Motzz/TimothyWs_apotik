<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
       //$result=DB::select(DB::raw("select * from medicines"));
       //$result=DB::table("medicines")->get();
       $result=Medicine::all();
        return view('medicine.index',[
            'result' => $result
        ]);
       //dd($result);
       //return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
        $data=$medicine;
        return view('medicine.show',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
      public function coba1()
    {
        //
        $result=DB::table('medicines')
                ->where('generic_name','like','%fen%')
                ->get();
        

        /* $result=DB::table('medicines')
                ->groupBy('generic_name')
                ->having('generic_name','>','1')
                ->get();*/
         $result=DB::table('medicines')->count();
         $result=DB::table('medicines')->max('price');
         $result=DB::table('medicines')
         ->where('price','<',20000)
         ->count();

         //inner join
          $result=DB::table('medicines')
         ->join('categories','medicines.category_id','=','categories.id')
         ->get();

         //eloquent filter
        $result=Medicine::where('price','>',20000)  
            ->orderBy('price','desc')
            ->get();

        dd($result);
    }

    public function showInfo()
    {
        /*return response()->json(array(
        'status'=>'oke',
        'msg'=>"<div class='alert alert-info'>
                koe ero? <br>pesan iki tekan controller lo sangar to.'</div>"
         ),200);*/
         /*$result=Medicine::orderBy('price','DESC')->first();
            return response()->json(array(
                'status'=>'oke',
                'msg'=>"<div class='alert alert-info'>
                Did you know? <br>The most expensive product is ". $result->generic_name . "</div>"
            ),200);*/

        $result=Medicine::orderBy('price','desc')->first();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>"<div class='alert alert-danger'>
                     Did you know? <br>
                     Harga obat termahal adalah ".
                     $result->generic_name . " ".$result->form . 
                     " dengan harga " . $result->price
          ),200); 



    }
}
