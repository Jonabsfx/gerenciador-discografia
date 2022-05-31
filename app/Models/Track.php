<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory, UuidTrait;
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'name', 
        'duration',
        'feat'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
