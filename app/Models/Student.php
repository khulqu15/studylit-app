<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'user_id',
        'country',
        'province',
        'district',
        'village',
        'address',
        'type',
        'postcode',
        'instance',
        'major',
        'class',
        'interest',
        'talent',
        'passion',
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
