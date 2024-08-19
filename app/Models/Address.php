<?php

namespace App\Models;

use App\Models\Checkpoint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkpoint_id','street_address','city','state','zip_code','country'
    ];        
    
    public function Checkpoint()
    {
      return $this->belongsTo(Checkpoint::class,'checkpoint_id');
    }    
}
