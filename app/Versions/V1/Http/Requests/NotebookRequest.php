<?php

namespace App\Versions\V1\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

/**
 * @property-read string $full_name
 * @property-read string $company
 * @property-read string $phone
 * @property-read string $email
 * @property-read Carbon $birth_date
 * @property-read UploadedFile $photo
*/
class NotebookRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'birth_date' => Carbon::make($this->birth_date)
        ]);
    }

    public function rules()
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'phone:RU'],
            'email' => [
                'required',
                'email',
                Rule::unique('notebooks', 'email')->ignore($this->notebook)
            ],
            'birth_date' => ['nullable', 'date', 'before:now'],
            'image' => ['nullable', 'image']
        ];
    }
}
