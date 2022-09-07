<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Course extends Model
{
    protected $table = 'courses';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'name', 'certificate', 'thumbnail', 'type', 'status', 'price', 'level', 'description', 'mentor_id'
    ];

    // Jika ingin mendapatkan data dari model lain harus ada foreign key yang menghubungkan 2 table
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class)->orderBy('id', 'asc');
    }

    public function images()
    {
        return $this->hasMany(ImageCourse::class)->orderBy('id', 'asc');
    }
}
