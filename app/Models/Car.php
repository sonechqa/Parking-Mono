<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'folders';
    protected $fillable = ['brand', 'model', 'body_color', 'state_number_RF', 'status'];
    public $timestamps = false;

    public function client()
    {
      return $this->belongsTo(Client::class);
    }
}
