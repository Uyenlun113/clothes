<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'color';
    static public function getColorById($id){
        return self::find($id);
    }
    static public function getListColor(){
        return self::select('color.*')
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->get();
    }
}