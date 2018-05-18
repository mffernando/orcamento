<?php

namespace App\Presenters;

use App\Transformers\BudgetTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BudgetPresenter.
 *
 * @package namespace App\Presenters;
 */
class BudgetPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BudgetTransformer();
    }
}
