<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BudgetCreateRequest;
use App\Http\Requests\BudgetUpdateRequest;
use App\Repositories\BudgetRepository;
use App\Validators\BudgetValidator;

/**
 * Class BudgetsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BudgetsController extends Controller
{
    /**
     * @var BudgetRepository
     */
    protected $repository;

    /**
     * @var BudgetValidator
     */
    protected $validator;

    /**
     * BudgetsController constructor.
     *
     * @param BudgetRepository $repository
     * @param BudgetValidator $validator
     */
    public function __construct(BudgetRepository $repository, BudgetValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $budgets = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $budgets,
            ]);
        }

        return view('budgets.index', compact('budgets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BudgetCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BudgetCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $budget = $this->repository->create($request->all());

            $response = [
                'message' => 'Budget created.',
                'data'    => $budget->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budget = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $budget,
            ]);
        }

        return view('budgets.show', compact('budget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budget = $this->repository->find($id);

        return view('budgets.edit', compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BudgetUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BudgetUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $budget = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Budget updated.',
                'data'    => $budget->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Budget deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Budget deleted.');
    }
}
