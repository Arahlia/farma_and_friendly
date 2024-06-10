<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule',
        'phone',
        'description',
        'pharmacy_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'pharmacy_id');
    }
}
