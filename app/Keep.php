<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keep extends Model
{
    protected $fillable = [
        'keep', 'status', 'user_id'
    ];
    
    public function user(){
        return $this->BelongsTo(User::class);
    }
}
