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
            ->select('cars.id', 'brand', 'model', 'body_color', 'state_number_RF', 'status', 'owner_id', 'clients.full_name as full_name')
            ->join('clients', 'clients.id', '=', 'cars.owner_id')
            ->where('owner_id', $req->get('owner_id'))
            ->get();

        return Inertia::render('Update', ['client' => $client, 'cars' => $cars]);
    }

    public function updateClient(Request $req) {
        $updatedClient = DB::table('clients')->where('clients.id', $req->get('id'))
            ->update(['full_name' => $req->get('full_name'),  'gender' => $req->get('gender'),
                'phone_number' => $req->get('phone_number'), 'address' => $req->get('address')]);
    }

    public function create(Request $req) {
        return Inertia::render('Create');
    }

    public function saveClient(Request $req) {
        $client = DB::table('clients')->insert(['full_name' => $req->get('full_name'),  'gender' => $req->get('gender'),
        'phone_number' => $req->get('phone_number'), 'address' => $req->get('address')]);
    }

    public function getClients(Request $req) {
        $input = $req->get('input');
        $clients = DB::table('clients')->where('full_name', 'LIKE', $input.'%')->get();
        return $clients;
    }
}

