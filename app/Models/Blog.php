<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Blog extends Model
{
    protected $primaryKey="blogid";
    protected $fillable = ['title','description','image'];

}
?>