<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Auth;
use PDF;
use DB;
class DynamicPDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dynamic_pdf');
    }

   
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    
    {
        $where = array('id' => $id);
        $post  = Pegawai::find($where);

        return view('Dynamic_pdf', ['post' => $post]);
   

        //
    }

   


    function pdf($id)
    {
       
        $where = array('id' => $id);
        $post  = Pegawai::find($where);

        $dompdf= PDF::loadview('file',compact('post'));

        return $dompdf->stream('download.pdf');
    }

  
   

  
    
}
