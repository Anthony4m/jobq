<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'tags',
        'logo',
        'company',
        'email',
        'website',
        'location',
        'salary',
        'description',
    ];
    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship To JobApplication
    public function applicants() {
        return $this->hasMany(JobApplication::class);
    }
}
