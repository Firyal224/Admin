<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Event;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $list_pegawai = Pegawai::all();
        if($request->ajax()){
            
            return datatables()->of($list_pegawai)
                        ->addColumn('action', function($data){

                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post" style="margin-left:10px;"><i class="fa fa-pencil" style="margin-right:10px;margin-left:5px"></i> Edit</a>';
                            $button .= '<button type="button" name="show" id="'.$data->id.'" class="show btn btn-primary btn-sm show-post" style="  margin-left: 3px;
                            margin-left: 10px;margin-top:10px"><i class="fa fa-eye" style="margin-right:3px"></i> Show </button>';     
                            
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style=" margin-left: 10px;margin-top:10px"><i class="fa fa-trash"></i> Delete</button>';     
                         
                           
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);


                        
             
              
                     
        }

        return view('pegawai');

    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate(
        [
        'no' => 'required|regex:/[0-9]/',
       
        ]);
       
        $post   =   Pegawai::updateOrCreate(['id' => $id],
                    [
                        'agama' => $request->agama,
                        'nama_pegawai' => $request->nama_pegawai,
                        'tanggal_lahir' => $request->tanggal_lahir,
                        'no' => $request->no,
                        'alamat' => $request->alamat,
                        'file' => $request->file,
                     

                        
                    ]); 

        return response()->json($post);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Pegawai::where($where)->first();
     
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Pegawai::where('id',$id)->delete();
     
        return response()->json($post);
    }


    
    
}