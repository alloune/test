<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id' => 'integer',
    ];

    protected $fillable =[
        'user_id',
        'name',
        'description',
        'author_name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
}
}
