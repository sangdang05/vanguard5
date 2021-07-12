<?php

namespace Vanguard\Http\Controllers\Api;
use Vanguard\Http\Controllers\Api;
use  Vanguard\Binhluan;
use  Vanguard\Http\Resources\BinhluanResource;

use  Illuminate\Http\Request;
use auth;
/**
 * @package Vanguard\Http\Controllers\Api
 */
class BinhluanController extends ApiController
{
    

    public function __construct()
    {

    }
    public function thembinhluan(Request $request)
    {

        $binhluan = new Binhluan();
        $binhluan->iduser =auth()->id();
        $binhluan->noidung =$request->noidung;
        $binhluan->save();

    }
    public function dsbinhluan()
    {
       $dsbl= Binhluan::all();
       return BinhluanResource::collection($dsbl);

    }
}
