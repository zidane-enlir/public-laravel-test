<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashTag extends Model
{
    protected $fillable = [
        'name'
    ];
    
    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tweets()
    {
        return $this->belongsToMany('App\Models\Tweet');
    }
}
