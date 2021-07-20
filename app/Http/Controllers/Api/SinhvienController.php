<?php

namespace Vanguard\Http\Controllers\Api;
use Vanguard\Http\Controllers\Api;
use Vanguard\sinhvien;
use Vanguard\Http\Resources\sinhvienResource;
use Illuminate\Http\Request;
use auth;
use Cache;
/**
 * @package Vanguard\Http\Controllers\Api
 */
class sinhvienController extends ApiController
{
    

    public function __construct()
    {

    }
    public function themsinhvien(Request $request)
    {

        $sinhvien = new Sinhvien();
        $sinhvien->masv =$request->masv;
        $sinhvien->tensv =$request->tensv;
        $sinhvien->gioitinh =$request->gioitinh;
        $sinhvien->namsinh =$request->namsinh;
        $sinhvien->save();
        return new sinhvienResource($sinhvien);
    }
    public function updatesinhvien(Request $request)
    {
        $id = $request->id;
        $sinhvien = Sinhvien::find($id);
        $sinhvien->masv =$request->masv;
        $sinhvien->tensv =$request->tensv;
        $sinhvien->gioitinh =$request->gioitinh;
        $sinhvien->namsinh =$request->namsinh;
        $sinhvien->save();
        return new sinhvienResource($sinhvien);
    }
    public function deletesinhvien($id)
    {
        Sinhvien::where('id',$id)->delete();
        Cache::flush();
        return $this->respondWithSuccess();   
    }
    public function dssinhvien()
    {
       $dssv= Sinhvien::all();
       return sinhvienResource::collection($dssv);
    }
}
