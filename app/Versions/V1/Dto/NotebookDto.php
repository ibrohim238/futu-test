<?php

namespace App\Versions\V1\Dto;

use App\Versions\V1\Http\Requests\NotebookRequest;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class NotebookDto extends DataTransferObject
{
    public string $full_name;
    public ?string $company;
    public string $phone;
    public string $email;
    public ?Carbon $birth_date;
    public ?UploadedFile $image;

    public static function fromArray(NotebookRequest $request): NotebookDto
    {
        return new self($request->validated());
    }
}
