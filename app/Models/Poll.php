<?php

// app/Models/Poll.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'option1', 'option2', 'option3'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
