<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Measurement extends Model
{
    protected $primaryKey="unitid";
    protected $fillable = ['unit'];

}
?>