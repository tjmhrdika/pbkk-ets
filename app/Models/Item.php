<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'condition_id', 'description', 'damage', 'amount', 'image', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function condition(): BelongsTo
    {
        return $this->belongsTo(Condition::class);
    }
}
