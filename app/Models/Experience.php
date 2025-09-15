<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'role',
        'company',
        'start_date',
        'end_date',
        'is_present',
        'description'
    ];

    protected $casts = [
        'is_present' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected $appends = ['end_date_label'];

    public function getEndDateLabelAttribute()
    {
        return $this->is_present ? 'Present' : ($this->end_date?->format('Y-m-d'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
