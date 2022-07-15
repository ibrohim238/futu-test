<?php

namespace App\Versions\V1\Services;

use App\Models\Notebook;
use App\Versions\V1\Dto\NotebookDto;
use App\Versions\V1\Repositories\NotebookRepository;
use Illuminate\Http\UploadedFile;

class NotebookService
{
    private NotebookRepository $repository;

    public function __construct(
        private Notebook $notebook
    ) {
        $this->repository = app(NotebookRepository::class, [
            'notebook' => $this->notebook,
        ]);
    }

    public function create(NotebookDto $dto): Notebook
    {
        $this->repository
            ->fill($dto->except('image')->toArray())
            ->save()
            ->addMedia($dto->image);

        return $this->notebook;
    }

    public function update(NotebookDto $dto): Notebook
    {
        $this->repository
            ->fill($dto->except('image')->toArray())
            ->save()
            ->addMedia($dto->image);

        return $this->notebook;
    }

    public function destroy(): void
    {
        $this->repository
            ->deleteMedia()
            ->delete();
    }
}
