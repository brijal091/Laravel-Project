<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Feedback extends Model
{
    protected $primaryKey="feedbackid";
    protected $fillable = ['feedback','userid'];

}
?>