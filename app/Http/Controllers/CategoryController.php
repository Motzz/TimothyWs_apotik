<?php

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $result=Category::all();
        return view('category.index',[
            'result' => $result
        ]);
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    public function showlist($id_category)
    {
        $data=Category::find($id_category);
        $namecategory=$data->name;
        $result=$data->medicines;
        if($result) $getTotalData=$result->count();
          else  $getTotalData=0;
        return view('report.list_medicines_by_category',
          compact('id_category','namecategory','result','getTotalData'));
    }
     public function coba2()
    {
       
       //1.
       $result=DB::table("categories")->get();
       $result=Category::all();
       //2.
       $result = DB::table('medicines')
        ->select('generic_name','restriction_formula','price')
        ->get();
       $result = Medicine::select('generic_name','restriction_formula','price')
        ->get();
       //3.
         $result=DB::table('medicines')
         ->select('generic_name','restriction_formula','categories.name')
         ->join('categories','medicines.category_id','=','categories.id')
         ->get();
        $result=Medicine::select('generic_name','restriction_formula','categories.name')
         ->join('categories','medicines.category_id','=','categories.id')
         ->get();
        //4.
       $result = DB::table('medicines')
        ->selectRaw('category_id')
        ->join('categories','medicines.category_id','=','categories.id')
        ->groupBy('category_id')
        ->get();
       
          $result = Medicine::selectRaw('count(category_id)')
        ->join('categories','medicines.category_id','=','categories.id')
        ->groupBy('category_id')
        ->get();

       //5.
       $result = DB::table("categories")
        ->selectRaw('name')
        ->whereNOTIn('id',function($query){
            $query->select('category_id')->from('medicines');
        })
        ->get();
        
        $result = Category::select('name')
        ->whereNOTIn('id',function($query){
            $query->select('category_id')->from('medicines');
        })
        ->get();

        //6.
       $result = DB::table('categories')
        ->selectRaw('IFNULL(AVG(medicines.price), 0) as price')
        ->leftJoin('medicines', 'categories.id', '=', 'medicines.category_id')
        ->groupBy('categories.name')
        ->get();
         $result =  Category::selectRaw('IFNULL(AVG(medicines.price), 0) as price')
        ->leftJoin('medicines', 'categories.id', '=', 'medicines.category_id')
        ->groupBy('categories.name')
        ->get();
      

       //7.
       $result=DB::table('categories')
         ->select('categories.name')
         ->join('medicines','categories.id','=','medicines.category_id')
         ->groupBy('categories.name')
         ->havingRaw('COUNT(medicines.category_id) = ?', [1])
         ->get();

         $result=Category::select('categories.name')
         ->join('medicines','categories.id','=','medicines.category_id')
         ->groupBy('categories.name')
         ->havingRaw('COUNT(medicines.category_id) = ?', [1])
         ->get();
      
        //8.
         $result=DB::table('medicines')
         ->select('generic_name')
         ->groupBy('medicines.generic_name')
         ->havingRaw('COUNT(medicines.form) = ?', [1])
         ->get();

         $result=Medicine::select('generic_name')
         ->groupBy('medicines.generic_name')
         ->havingRaw('COUNT(medicines.form) = ?', [1])
         ->get();
        //9.
         

         $result =Category::select('categories.name','medicines.generic_name')
        ->join('medicines','categories.id','=','medicines.category_id')
        ->havingRaw('MAX(price)')
        ->get();

         $result =Category::select('categories.name','medicines.generic_name')
        ->join('medicines','categories.id','=','medicines.category_id')
        ->havingRaw('MAX(price)')
        ->get();

        dd($result);
    }
}
