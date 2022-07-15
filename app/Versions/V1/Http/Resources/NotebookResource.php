<?php

namespace App\Versions\V1\Http\Resources;

use App\Models\Notebook;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Notebook
*/
class NotebookResource extends JsonResource
{
    public function toArray($request): array
    {

        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'company' => $this->company,
            'phone' => $this->phone,
            'email' => $this->email,
            'birth_date' => $this->birth_date,
            'photo' => new MediaResource($this->getFirstMedia()),
            'created_at' => $this->created_at,
        ];
    }
}
