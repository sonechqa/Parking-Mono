<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function deleteCar(Request $req) {
        $genre = DB::table('cars')->where('id', $req->get('id'))->delete();
    }

    public function updateCar(Request $req) {
        $ownerId = DB::table('clients')
            ->where('full_name', $req->get('owner'))
            ->value('id');

        if ($req->get('status') == "Да") {
            $status = 1;
        } else {
            $status = 0;
        }

        $updatedCar = DB::table('cars')->where('id', $req->get('id'))->update(['brand' => $req->get('brand'), 
            'model' => $req->get('model'), 'body_color' => $req->get('body_color'),
            'state_number_RF' => $req->get('state_number_RF'), 'status' => $status, 'owner_id' => $ownerId]);
    }

    public function saveCar(Request $req) {
        $ownerId = DB::table('clients')
            ->where('full_name', $req->get('owner'))
            ->value('id');

        if ($req->get('status') == "Да") {
            $status = 1;
        } else {
            $status = 0;
        }

        $car = DB::table('cars')->insert(['brand' => $req->get('brand'),  'model' => $req->get('model'),
        'body_color' => $req->get('body_color'), 'state_number_RF' => $req->get('state_number_RF'),
        'status' => $status, 'owner_id' => $ownerId]);
    }
}