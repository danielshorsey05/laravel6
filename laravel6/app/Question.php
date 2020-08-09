<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    
    
    /*
     * Relationship
     */
    public function questionnaires()
    {
       return $this->belongsTo(Questionnaire::class); 
    }
    
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
}
