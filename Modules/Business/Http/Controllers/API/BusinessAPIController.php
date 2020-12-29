<?php

namespace Modules\Business\Http\Controllers\API;

use Modules\Business\Http\Requests\API\CreateBusinessAPIRequest;
use Modules\Business\Http\Requests\API\UpdateBusinessAPIRequest;
use Modules\Business\Entities\Business;
use Modules\Business\Repositories\BusinessRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BusinessController
 * @package Modules\Business\Http\Controllers\API
 */

class BusinessAPIController extends AppBaseController
{
    /** @var  BusinessRepository */
    private $businessRepository;

    public function __construct(BusinessRepository $businessRepo)
    {
        $this->businessRepository = $businessRepo;
    }

    /**
     * Display a listing of the Business.
     * GET|HEAD /businesses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $businesses = $this->businessRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($businesses->toArray(), 'Businesses retrieved successfully');
    }

    /**
     * Store a newly created Business in storage.
     * POST /businesses
     *
     * @param CreateBusinessAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessAPIRequest $request)
    {
        $input = $request->all();

        $business = $this->businessRepository->create($input);

        return $this->sendResponse($business->toArray(), 'Business saved successfully');
    }

    /**
     * Display the specified Business.
     * GET|HEAD /businesses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Business $business */
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            return $this->sendError('Business not found');
        }

        return $this->sendResponse($business->toArray(), 'Business retrieved successfully');
    }

    /**
     * Update the specified Business in storage.
     * PUT/PATCH /businesses/{id}
     *
     * @param int $id
     * @param UpdateBusinessAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessAPIRequest $request)
    {
        $input = $request->all();

        /** @var Business $business */
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            return $this->sendError('Business not found');
        }

        $business = $this->businessRepository->update($input, $id);

        return $this->sendResponse($business->toArray(), 'Business updated successfully');
    }

    /**
     * Remove the specified Business from storage.
     * DELETE /businesses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Business $business */
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            return $this->sendError('Business not found');
        }

        $business->delete();

        return $this->sendSuccess('Business deleted successfully');
    }
}
