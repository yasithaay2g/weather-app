<?php


namespace App\Modules\Temperatures\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city1_name',
        'city1_temp_f',
        'city1_temp_c',
        'city2_name',
        'city2_temp_f',
        'city2_temp_c',
        'user_id',
        'status',
        
    ];
    
}