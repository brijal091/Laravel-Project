<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Orderdetails extends Model
{
    protected $primaryKey="orderdetailsid";
    protected $fillable = ['orderid','productid','quantity','price'];

}
?>