<?php

namespace App\Swagger\Controllers;

# php artisan l5-swagger:generate

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Test Api",
 *      description="Test api",
 *      @OA\Contact(
 *          email="alexandr.statut@instafxgroup.com",
 *          name="ASt"
 *      ),
 * )
 *
 * @OA\Server(
 *      url="https://test1210/api/v1",
 *      description="Dev API server"
 * )
 *
 *  @OA\SecurityScheme(
 *     type="http",
 *     description="Your token must be provided by Admin",
 *     name="Api Client",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
 * )
 *
 * @OA\ExternalDocumentation(
 *     description="Docs",
 *     url="https://test1210/api/documentation",
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Auth in API"
 * )
 *
 * @OA\Tag(
 *     name="Payments",
 *     description="Payments"
 * )
 */
class Controller {}
