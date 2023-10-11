<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'titolo',
        'immagine',
        'descrizione',
        'link_github',
        'slug',
        'type_id'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

}
