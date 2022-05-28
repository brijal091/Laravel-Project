<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Registration extends Model
{
    protected $primaryKey="userid";
    protected $fillable = ['firstname','lastname','address','cityid','pincode','phone','emailid','password','created_at','updated_at'];

}
?>