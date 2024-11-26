<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    use HasFactory;
    protected $table = "package";
    protected $primaryKey = "package_id";

    public function images()
    {
        return $this->hasMany(image::class);
    }
}
