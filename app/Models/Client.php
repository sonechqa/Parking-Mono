<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'clients';
    protected $fillable = ['full_name', 'gender', 'phone_number', 'address'];

    public function cars() {
        return $this->hasMany(Car::class);
    }
}
