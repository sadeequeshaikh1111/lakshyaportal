<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class educational_detail extends Model
{
    use HasFactory;
    protected $table = 'educational_details';

    protected $fillable = [
        'email',
        'university_board',
        'college_institute',
        'passing_year',
        'cgpa_percentage',
        'Edu_Category',
        'Course'
    ];
}
