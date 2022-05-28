<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Ordermaster extends Model
{
    protected $primaryKey="oderid";
    protected $fillable = ['orderstate','userid','payment','paymentstate','orderstate'];

}
?>