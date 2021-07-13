<?php

namespace Vanguard\Http\Controllers\Api;
use Vanguard\Http\Controllers\Api;
use  Vanguard\Sach;
use  Vanguard\Http\Resources\SachResource;
use  Illuminate\Http\Request;
use auth;
use Cache;
/**
 * @package Vanguard\Http\Controllers\Api
 */
class SachController extends ApiController
{
    

    public function __construct()
    {

    }
    public function them(Request $request)
    {

        $sach = new Sach();
        $sach->masach =$request->masach;
        $sach->tensach =$request->tensach;
        $sach->loai =$request->loai;
        $sach->soluong =$request->soluong;
        $sach->tacgia =$request->tacgia;
        $sach->save();
        return new SachResource($sach);
    }
    public function sua($id,Request $request)
    {
        $id = $request->id;
        $sach = Sach::find($id);
        $sach->masach =$request->masach;
        $sach->tensach =$request->tensach;
        $sach->loai =$request->loai;
        $sach->soluong =$request->soluong;
        $sach->tacgia =$request->tacgia;
        $sach->save();
        return new SachResource($sach);
    }
    public function xoa($id)
    {
        Sach::where('id',$id)->delete();
        Cache::flush();
        return $this->respondWithSuccess();   
    }
    public function danhsach()
    {
       $ds= Sach::all();
       return SachResource::collection($ds);

    }
    /*public function dssinhvienid($id, Request $request)
    {
       $id = $request->id;
       $sinhvien = Sinhvien::find($id);
       if($sinhvien != null)
       {
            return new sinhvienResource($sinhvien);
            Cache::flush();
       }
       return $this->respondWithSuccess();

    }*/
}
