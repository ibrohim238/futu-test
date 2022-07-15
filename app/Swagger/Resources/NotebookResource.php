<?php

namespace App\Swagger\Resources;

use App\Swagger\Models\Notebook;

/**
 * @OA\Schema(
 *     title="NotebookResource",
 *     description="Notebook resource",
 *     @OA\Xml(
 *         name="NotebookResource"
 *     )
 * )
 */
class NotebookResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     */
    private Notebook $data;
}
