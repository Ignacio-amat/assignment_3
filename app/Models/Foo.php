<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kazaam()
    {
        if ($this->wombat) {
            return $this->thud * pi();
        } else {
            return $this->thud;
        }
    }
}
