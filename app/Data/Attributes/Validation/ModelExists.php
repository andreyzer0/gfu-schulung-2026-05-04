<?php

namespace App\Data\Attributes\Validation;

use App\Interfaces\Services\EventServiceInterface;
use Illuminate\Validation\Rules\Exists as BaseExists;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Support\Validation\Constraints\DatabaseConstraint;
use Spatie\LaravelData\Support\Validation\References\ExternalReference;

#[\Attribute]
class ModelExists extends Exists
{
    public function __construct(
    protected null|string|ExternalReference          $table = null,
    protected null|string|ExternalReference          $column = 'NULL',
    protected null|string|ExternalReference          $connection = null,
    protected bool|ExternalReference                 $withoutTrashed = false,
    protected string|ExternalReference               $deletedAtColumn = 'deleted_at',
    protected null|DatabaseConstraint|array|\Closure $where = null,
    protected ?BaseExists                            $rule = null,
) {

        /**@ */
        $model = new $table;

        parent::__construct(
            table: (string) $model->getTable(),
            column: 'NULL' !== $this->column ? $this->column : $model->getKeyName(),
        );
    }
}
