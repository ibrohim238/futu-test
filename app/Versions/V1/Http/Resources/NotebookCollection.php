<?php

namespace App\Versions\V1\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NotebookCollection extends ResourceCollection
{
    public $collects = NotebookResource::class;
}
