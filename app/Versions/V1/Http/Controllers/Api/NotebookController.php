<?php

namespace App\Versions\V1\Http\Controllers\Api;

use App\Models\Notebook;
use App\Swagger\Responses\NotFoundResponse;
use App\Swagger\Responses\UnprocessableEntityResponse;
use App\Versions\V1\Dto\NotebookDto;
use App\Versions\V1\Http\Controllers\Controller;
use App\Versions\V1\Http\Requests\NotebookRequest;
use App\Versions\V1\Http\Resources\NotebookCollection;
use App\Versions\V1\Http\Resources\NotebookResource;
use App\Versions\V1\Services\NotebookService;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use OpenApi\Attributes as OA;

class NotebookController extends Controller
{
    #[OA\Get(
        '/api/v1/notebook',
        description: 'Список записей',
        summary: 'Список записей',
        tags: ['Notebook'],
        parameters: [
            new OA\Parameter(
                name: 'page',
                in: 'path',
                required: false,
                schema: new OA\Schema(type: 'integer'),
            ),
            new OA\Parameter(
                name: 'count',
                in: 'path',
                required: false,
                schema: new OA\Schema(type: 'integer'),
            )
        ]
    )]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(ref: "#/components/schemas/NotebookResource")
    )]
    #[NotFoundResponse]
    public function index(Request $request): NotebookCollection
    {
        $notebooks = QueryBuilder::for(Notebook::class)
            ->allowedFilters([
                'full_name',
                'company'
            ])->paginate($request->get('count'));

        return new NotebookCollection($notebooks);
    }

    #[OA\POST(
        '/api/v1/notebook',
        description: 'Добавить запись',
        summary: 'Добавить запись',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/NotebookRequest'),
        ),
        tags: ['Notebook'],
    )]
    #[OA\Response(
        response: 201,
        description: 'OK',
        content: new OA\JsonContent(ref: "#/components/schemas/Notebook")
    )]
    #[UnprocessableEntityResponse]
    public function store(NotebookRequest $request): NotebookResource
    {
        $notebook = app(NotebookService::class)->create(NotebookDto::fromArray($request));

        return new NotebookResource($notebook);
    }

    #[OA\Get(
        '/api/v1/notebook/{id}',
        description: 'Страница запися',
        summary: 'Страница запися',
        tags: ['Notebook'],
        parameters: [
          new OA\Parameter(
              name: 'id',
              in: 'path',
              required: true,
              schema: new OA\Schema(type: 'integer'),
              example: 1,
          )
        ],
    )]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(ref: "#/components/schemas/Notebook")
    )]
    #[NotFoundResponse]
    public function show(Notebook $notebook): NotebookResource
    {
        return new NotebookResource($notebook);
    }

    #[OA\Patch(
        '/api/v1/notebook/{id}',
        description: 'Обновление запися',
        summary: 'Обновление запися',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/NotebookRequest'),
        ),
        tags: ['Notebook'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer'),
                example: 1,
            ),
        ],
    )]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(ref: "#/components/schemas/Notebook")
    )]
    #[NotFoundResponse]
    #[UnprocessableEntityResponse]
    public function update(NotebookRequest $request, Notebook $notebook): NotebookResource
    {
        app(NotebookService::class, [
            'notebook' => $notebook
        ])->update(NotebookDto::fromArray($request));

        return new NotebookResource($notebook);
    }

    #[OA\Delete(
        '/api/v1/notebook/{id}',
        description: 'Удаление запися',
        summary: 'Удаление запися',
        tags: ['Notebook'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer'),
            ),
        ]
    )]
    #[OA\Response(
        response: 204,
        description: 'OK',
        content: new OA\JsonContent()
    )]
    #[NotFoundResponse]
    public function destroy(Notebook $notebook)
    {
        app(NotebookService::class, [
            'notebook' => $notebook
        ])->delete();

        return response()->noContent();
    }
}
