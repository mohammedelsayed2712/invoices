<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'section_id',
        'status',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
