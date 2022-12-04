<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class Blog extends Model
{
    protected $table = "blogs";
    protected $guarded = ["id", "created_at", "updated_at"];
    use HasFactory;
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function format() {
        return $this->created_at->diffForHumans();
    }
    public function isNew() {
        $now = \Carbon\Carbon::now();
        $secondsSinceCreated = strtotime($now) - strtotime($this->created_at);
        if($secondsSinceCreated > 86400) {
            return false;
        }
        return true;
    }
    public function readableDate() {
        $date = date("d-M-Y", strtotime($this->created_at));
        return $date;
    }
    public function scopeRelated($query, $categories) {
        $first = $categories[0];
        $second = $categories[1] ?? null;
        $third = $categories[2] ?? null;
        $result = $query->where("categories", "regexp", $first);
        if(!is_null($second)) {
            $result->orWhere("categories", "regexp", $second);
        } 
        if(!is_null($third)) {
            $result->orWhere("categories", "regexp", $third);
        }
        return $result;
    }
    protected static function boot() {
        parent::boot();
        Blog::creating(function($model) {
            $model->status = 1;
        });
    }
}
