<?php

namespace App\Models;

use App\Enums\EventType;
use App\Traits\HasDuration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property EventType $type
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property Trainer $trainer //?
 */

class Event extends Model
{
    use HasDuration{
        getDurationInDays as traitGetDurationInDays;
    }
    use softDeletes;

    protected $fillable = [
        'title',
        'description',
        'type',
        'start_date',
        'end_date',
        'location',

    ];
    protected $casts = [
        'type' => EventType::class,
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    public function getDurationInDays(): int
    {
        return $this->traitGetDurationInDays() + 1;
    }

    public function trainer(): belongsTo
    {
        return $this->belongsTo(Trainer::class);
    }
}
