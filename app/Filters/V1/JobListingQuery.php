<?php
namespace App\Services\V1;

use Illuminate\Http\Request;

class JobListingQuery
{

    protected $allowedParams=[
        'salary' => ['mn', 'mx','eq','bt','lt','gt'],
        'title' => ['eq'],
        'company' => ['eq'],
        'location' => ['eq'],
        'tags' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'bt' => 'between',
        'mn' => '>=',
        'mx' => '<=',
    ];
    public function transform(Request $request){
        $eloQuery = [];

        foreach ($this->allowedParams as $param => $operators) {
            $query = $request->query($param);
            if(!isset($query)){
                continue;
            }
            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
