<?php

namespace App\Swagger\Controllers;

class Payment {

    /**
     *  @OA\Get(
     *     path="/payment",
     *     operationId="payment.index",
     *     summary="Payment list",
     *     description="Payment list",
     *     tags={"Payments"},
     *     @OA\Parameter(name="owner", in="query", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="currency", in="query", required=false, @OA\Schema(type="string", enum={"RUB", "USD", "EUR"})),
     *     @OA\Parameter(name="ticket", in="query", required=false, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response="200",
     *         description="List of payments",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", type="array", @OA\Items(ref="#/components/schemas/payment")),
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function index() {}

    /**
     *  @OA\Get(
     *     path="/payment/{id}",
     *     operationId="payment.show",
     *     summary="Payment info",
     *     description="Payment info",
     *     tags={"Payments"},
     *     @OA\Parameter(name="id", in="path", description="Payment ID", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response="200",
     *         description="Payment unfo",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", ref="#/components/schemas/payment"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Payment not found.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function show() {}

    /**
     * @OA\Post(
     *     path="/payment",
     *     operationId="payment.store",
     *     summary="Add new payment",
     *     description="Add new payment",
     *     tags={"Payments"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Payment data",
     *         @OA\JsonContent(
     *             required={"owner_id", "amount"},
     *             @OA\Property(property="owner_id", type="integer", example="1", description="Payer ID"),
     *             @OA\Property(property="amount", type="numeric", format="double", example="50.50", description="Amount"),
     *             @OA\Property(property="currency", type="string", nullable="true", example="RUB", description="Cuttency"),
     *             @OA\Property(property="ticket", type="integer", nullable="true", example="123456", description="Ticket"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Created payment ID",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function store() {}

    /**
     * @OA\Put(
     *     path="/payment/{id}",
     *     operationId="payment.update",
     *     summary="Update payment",
     *     description="Update payment",
     *     tags={"Payments"},
     *     @OA\Parameter(name="id", in="path", description="Payment ID", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Payment data",
     *         @OA\JsonContent(
     *             @OA\Property(property="owner_id", type="integer", nullable="true", example="1", description="Payer ID"),
     *             @OA\Property(property="amount", type="numeric", nullable="true", format="double", example="50.50", description="Amount"),
     *             @OA\Property(property="currency", type="string", nullable="true", example="RUB", description="Cuttency"),
     *             @OA\Property(property="ticket", type="integer", nullable="true", example="123456", description="Ticket"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Update result",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="bool")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function update() {}

    /**
     *  @OA\Delete(
     *     path="/payment/{id}",
     *     operationId="payment.destroy",
     *     summary="Delete payment",
     *     description="Delete payment",
     *     tags={"Payments"},
     *     @OA\Parameter(name="id", in="path", description="Payment ID", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response="200",
     *         description="Destroy result",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="bool", example="true")
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Payment not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="There are some active events in this stream OR Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function destroy() {}

}
