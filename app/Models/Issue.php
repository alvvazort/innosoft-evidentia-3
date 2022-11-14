<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{

    protected $table="issues";

    protected $fillable = [
        'id', 'title', 'description', 'estimated_hours', 'user_id', 'status'
    ];

    public static function issues_to_do() {
        return Issue::where('status','=', 'TO DO')->orderByDesc('updated_at')->get();
    }
    public static function issues_in_progress() {
        return Issue::where('status','=', 'IN PROGRESS')->orderByDesc('updated_at')->get();
    }
    public static function issues_completed() {
        return Evidence::where('status','=', 'COMPLETED')->orderByDesc('updated_at')->get();
    }

}