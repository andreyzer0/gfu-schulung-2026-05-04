<?php

namespace App\Data;

use App\Data\Attributes\Validation\ModelExists;
use App\Enums\EventType;
use App\Models\Tag;
use App\Models\Trainer;
use App\Rules\NoWeekends;
use Illuminate\Validation\Rules\Enum;
use Spatie\LaravelData\Attributes\Validation\AfterOrEqual;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class EventData extends Data
{
    public $getTags;

    public function __construct(
        #[Min(5)]
        #[Max(191)]
        public string      $title,
        public string|null $description,
        #[Enum(EventType::class)]

        public string      $type,

        #[Date]
        #[NoWeekends()]
        public string      $start_date,

        #[Date]
        #[AfterOrEqual('start_date')]
        #[NoWeekends()]
        public string      $end_date,
        public string      $location,

        #[ModelExists(Trainer::class)]
        public int         $trainer_id,

        #[ArrayType]
        #[ModelExists(Tag::class)]
        /** @var array<int, int> */
        public array       $tags = [],
    )
    {}

    public function hasTags(): bool
    {
        return 0<count($this->getTags());
    }
    public function getTags(): array
    {
        return $this->tags;
    }
}
