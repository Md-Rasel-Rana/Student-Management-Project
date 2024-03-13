<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','batch_id','enroll_no','enroll_date','fee'];
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
