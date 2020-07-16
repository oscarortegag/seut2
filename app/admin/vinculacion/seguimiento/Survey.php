<?php

namespace App\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\SurveyQuestion;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function questions()
    {
       return $this->hasMany(SurveyQuestion::class);
    }
}