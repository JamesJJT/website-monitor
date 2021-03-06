<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url', 'owner', 'github_url', 'documentation_url'
    ];

    protected $with = ['ssl'];

    public function ssl()
    {
        return $this->hasOne(SSL::class);
    }

    public function ping()
    {
        return $this->hasMany(Ping::class);
    }
}
