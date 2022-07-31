<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
    ];

  static  public function categories()
    {
        return Category::all();
}
    public function beats()
    {
        return $this->hasMany(Beat::class);
    }
}
