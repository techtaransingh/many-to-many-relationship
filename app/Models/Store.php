<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';
    protected $fillable = ['store_name'];
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'regions_stores','store_id','region_id');
    }
}
