<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class State extends Model
{
    protected $primaryKey="stateid";
    protected $fillable = ['statename'];

}
?>