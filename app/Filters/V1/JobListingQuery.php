<?php
namespace App\Filters\V1;

use App\Filters\ApiFilter;

class JobListingQuery extends ApiFilter
{

    protected $allowedParams=[
        'salary' => ['mn', 'mx','eq','bt','lt','gt'],
        'title' => ['eq'],
        'company' => ['eq'],
        'location' => ['eq','ne'],
        'tags' => ['eq'],
    ];

    protected array $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'bt' => 'between',
        'mn' => '>=',
        'mx' => '<=',
        'ne' => '!='
    ];
}
