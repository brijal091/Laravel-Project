<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Product extends Model
{
    protected $primaryKey="productid";
    protected $fillable = ['productname','categoryid','description','image','unitid'];

}
?>