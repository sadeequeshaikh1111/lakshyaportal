<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_detail extends Model
{
    use HasFactory;
    protected $table = 'document_details';
    protected $fillable = [
        'email',
        'category',
        'course',
        'file_name',
        'file_path',
    ];

}
