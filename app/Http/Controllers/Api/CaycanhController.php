<?php

namespace Vanguard\Http\Controllers\Api;
use Vanguard\Http\Controllers\Api;
use  Vanguard\Caycanh;
use  Vanguard\Http\Resources\CaycanhResource;
use  Illuminate\Http\Request;
use auth;
use Cache;
/**
 * @package Vanguard\Http\Controllers\Api
 */
class CaycanhController extends ApiController
{
    

    public function __construct()
    {

    }
    public function themcay(Request $request)
    {

        $caycanh = new Caycanh();
        $caycanh->ten =$request->ten;
        $caycanh->loai =$request->loai;
        $caycanh->namtrong =$request->namtrong;
        $caycanh->mota =$request->mota;
        $caycanh->save();
        return new CaycanhResource($caycanh);
    }
    public function suacay(Request $request)
    {
        $id = $request->id;
        $caycanh = Caycanh::find($id);
        $caycanh->ten =$request->ten;
        $caycanh->loai =$request->loai;
        $caycanh->namtrong =$request->namtrong;
        $caycanh->mota =$request->mota;
        $caycanh->save();
        return new CaycanhResource($caycanh);
    }
    public function xoacay($id)
    {
        Caycanh::where('id',$id)->delete();
        Cache::flush();
        return $this->respondWithSuccess();   
    }
    public function dscay()
    {
       $ds= Caycanh::all();
       return CaycanhResource::collection($ds);

    }
    /*public function dscaycanhid($id, Request $request)
    {
       $id = $request->id;
       $caycanh = caycanh::find($id);
       if($caycanh != null)
       {
            return new caycanhResource($caycanh);
            Cache::flush();
       }
       return $this->respondWithSuccess();

    }*/
}
