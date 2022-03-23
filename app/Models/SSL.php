<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSL extends Model
{
    use HasFactory;

    protected $table = 'ssl';

    protected $guarded = [];

    public function isNearingExpiry(): bool
    {
        return now()->addMonth(1) > $this->validTo;
    }

    public function isExpired(): bool
    {
        return now() > $this->validTo;
    }
}
