<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applied_exam_detail extends Model
{
    use HasFactory;
    protected $table = 'applied_exam_details';
    protected $fillable = [
        'email',
        'exam_name',
        'Fees',
        'Payment_Status',
    ];
    

}
