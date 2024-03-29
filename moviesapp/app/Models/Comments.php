<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Comments extends Model
{
    // use HasFactory;
    protected $guarded = [];
    // protected $table = "comments";
    // protected $fillable = array('body', 'user_id');

    public function creator()
    {
        return $this->belongsTo(User::class,
        'user_id');
    }

    // public function getImagePathAttribute()
    // {
    //     return Storage::disk('public')->url($this->image);
    // }
}
