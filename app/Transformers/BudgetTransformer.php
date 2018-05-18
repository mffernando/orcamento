<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Budget;

/**
 * Class BudgetTransformer.
 *
 * @package namespace App\Transformers;
 */
class BudgetTransformer extends TransformerAbstract
{
    /**
     * Transform the Budget entity.
     *
     * @param \App\Entities\Budget $model
     *
     * @return array
     */
    public function transform(Budget $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
