<?php

namespace App\Versions\V1\Repositories;

use App\Models\Notebook;
use App\Versions\V1\Dto\NotebookDto;
use Illuminate\Http\UploadedFile;

class NotebookRepository
{
    public function __construct(
        private Notebook $notebook
    ) {
    }

    public function fill(array $data): static
    {
        $this->notebook->fill($data);

        return $this;
    }

    public function save(): static
    {
        $this->notebook->save();

        return $this;
    }

    public function addMedia(?UploadedFile $image): static
    {
        if (! empty($image)) {
            $this->notebook->addMedia($image)->toMediaCollection();
        }

        return $this;
    }

    public function deleteMedia(): static
    {
        $this->notebook->clearMediaCollection();

        return $this;
    }

    public function delete(): static
    {
        $this->notebook->delete();

        return $this;
    }
}