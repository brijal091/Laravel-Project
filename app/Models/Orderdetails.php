<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Orderdetails extends Model
{
    protected $primaryKey="orderid";
    protected $fillable = ['productid','quantity','price'];

}
?>