<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Libros extends Model
{
    use HasFactory;
    protected $table = 'libros';
    protected $fillable = ['nombre','descripcion','autor_id'];

    public $timestamps = false;

    public function autor(){
        return $this->belongsTo(\App\Models\Autor::class, 'autor_id');
    }
}   

