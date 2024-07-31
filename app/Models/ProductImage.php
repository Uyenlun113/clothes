<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_image';

    static public function getImageId($id){
        return self::find($id);
    }
    public function getLogo()
{
    if (!empty($this->name_image) && file_exists('upload/product/' . $this->name_image)) {
        return url('upload/product/' . $this->name_image);
    } else {
        return "";
    }
}

}