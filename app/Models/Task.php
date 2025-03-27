<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
     protected $fillable = [
        'title', 
        'description_task',
        'is_completed',
         'user_id', 
        'start_date', 
        'end_date'
    ];

     public function user():BelongsTo{
    return $this ->belongsTo(User::class);
     }
}
