<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFoodAPIRequest;
use App\Http\Requests\API\UpdateFoodAPIRequest;
use App\Models\Food;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FoodController
 * @package App\Http\Controllers\API
 */

class FoodAPIController extends AppBaseController
{
    /** @var  FoodRepository */
    private $foodRepository;

    public function __construct(FoodRepository $foodRepo)
    {
        $this->foodRepository = $foodRepo;
    }

    /**
     * Display a listing of the Food.
     * GET|HEAD /food
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $food = $this->foodRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($food->toArray(), 'Food retrieved successfully');
    }

    /**
     * Store a newly created Food in storage.
     * POST /food
     *
     * @param CreateFoodAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFoodAPIRequest $request)
    {
        $input = $request->all();

        $food = $this->foodRepository->create($input);

        return $this->sendResponse($food->toArray(), 'Food saved successfully');
    }

    /**
     * Display the specified Food.
     * GET|HEAD /food/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Food $food */
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            return $this->sendError('Food not found');
        }

        return $this->sendResponse($food->toArray(), 'Food retrieved successfully');
    }

    /**
     * Update the specified Food in storage.
     * PUT/PATCH /food/{id}
     *
     * @param int $id
     * @param UpdateFoodAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFoodAPIRequest $request)
    {
        $input = $request->all();

        /** @var Food $food */
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            return $this->sendError('Food not found');
        }

        $food = $this->foodRepository->update($input, $id);

        return $this->sendResponse($food->toArray(), 'Food updated successfully');
    }

    /**
     * Remove the specified Food from storage.
     * DELETE /food/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Food $food */
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            return $this->sendError('Food not found');
        }

        $food->delete();

        return $this->sendSuccess('Food deleted successfully');
    }
}
