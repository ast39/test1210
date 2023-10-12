<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\PaymentFilter;
use App\Http\Libs\AppError;
use App\Http\Libs\Helper;
use App\Http\Requests\Payments\PaymentFilterRequest;
use App\Http\Requests\Payments\PaymentStoreRequest;
use App\Http\Requests\Payments\PaymentUpdateRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;

/**
 * Work with payments
 */
class PaymentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Payment list
     *
     * @param PaymentFilterRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function index(PaymentFilterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['owner']    = auth()->id();
        if (!is_null($data['currency'] ?? null)) {
            $data['currency'] = Helper::getCurrencyId($data['currency']);

            if (is_null($data['currency'])) {
                return (new ErrorResource(new AppError(902)))
                    ->response()
                    ->setStatusCode(400);
            }
        }

        $filter = app()->make(PaymentFilter::class, [
            'queryParams' => array_filter($data)
        ]);

        $payments = Payment::filter($filter)
            ->get() ?: null;

        return PaymentResource::collection($payments)
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Payment info
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $payment = Payment::find($id);

        if ($payment->owner_id !== auth()->id()) {
            return (new ErrorResource(new AppError(903)))
                ->response()
                ->setStatusCode(400);
        }

        if (is_null($payment)) {
            return (new ErrorResource(new AppError(901)))
                ->response()
                ->setStatusCode(404);
        }

        return (new PaymentResource($payment))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Create new payment
     *
     * @param PaymentStoreRequest $request
     * @return JsonResponse
     */
    public function store(PaymentStoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['owner_id']    = auth()->id();
        $data['currency_id'] = Helper::getCurrencyId($data['currency'] ?? null);

        if (is_null($data['currency_id'])) {
             return (new ErrorResource(new AppError(902)))
                 ->response()
                 ->setStatusCode(400);
        }

        return response()->json([
            'data' => Payment::create($data)->payment_id ?? null,
        ], 201);
    }

    /**
     * Update payment
     *
     * @param PaymentUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(PaymentUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();

        $payment = Payment::find($id);

        if (is_null($payment)) {
            return (new ErrorResource(new AppError(901)))
                ->response()
                ->setStatusCode(404);
        }

        if ($payment->owner_id !== auth()->id()) {
            return (new ErrorResource(new AppError(903)))
                ->response()
                ->setStatusCode(400);
        }

        if (!is_null($data['currency'] ?? null)) {
            $data['currency_id'] = Helper::getCurrencyId($data['currency']);

            if (is_null($data['currency_id'])) {
                return (new ErrorResource(new AppError(902)))
                    ->response()
                    ->setStatusCode(400);
            }
        }

        return response()->json([
            'data' => $payment->update($data),
        ], 200);
    }

    /**
     * Delete payment
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $payment = Payment::find($id);

        if (is_null($payment)) {
            return (new ErrorResource(new AppError(901)))
                ->response()
                ->setStatusCode(404);
        }

        if ($payment->owner_id !== auth()->id()) {
            return (new ErrorResource(new AppError(903)))
                ->response()
                ->setStatusCode(400);
        }

        return response()->json([
            'data' => $payment->delete(),
        ], 200);
    }
}
