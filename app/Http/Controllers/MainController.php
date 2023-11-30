<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home() {
        $cars = DB::table('cars')
            ->select('clients.full_name as full_name', 'owner_id', 'cars.id', 'brand', 'model', 'state_number_RF')
            ->join('clients', 'clients.id', '=', 'cars.owner_id')
            ->where('status', '=', true)
            ->paginate(2);
        return Inertia::render('Home', ['cars' => $cars]);
    }
}
