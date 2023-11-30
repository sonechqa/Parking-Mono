<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function update(Request $req) {
        $client = DB::table('clients')
            ->select('id', 'full_name', 'gender', 'phone_number', 'address')
            ->where('clients.id', $req->get('owner_id'))
            ->first();
        
        $cars = DB::table('cars')
            ->select('id', 'brand', 'model', 'body_color', 'state_number_RF', 'status', 'owner_id')
            ->where('owner_id', $req->get('owner_id'))
            ->get();

        return Inertia::render('Update', ['client' => $client, 'cars' => $cars]);
    }

    public function updateClient(Request $req) {
        $client = DB::table('clients')->where('clients.id', $req->get('id'))
            ->update(['full_name' => $req->get('Name'),  'gender' => $req->get('Gender'),
                'phone_number' => $req->get('Phone_number'), 'address' => $req->get('Address')]);
    }
}

