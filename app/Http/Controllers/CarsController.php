<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function deleteCar(Request $req) {
        $genre = DB::table('cars')->where('id', $req->get('id'))->delete();
    }
}
