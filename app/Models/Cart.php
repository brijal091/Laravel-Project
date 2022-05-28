<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Cart extends Model
{
    protected $primaryKey="cartid";
    protected $fillable = ['userid','productid','quantity'];

}
?>