<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Ordermaster extends Model
{
    protected $primaryKey="orderid";
    protected $fillable = ['userid','payment','paymentstate','paymentid','orderstate'];

}
?>