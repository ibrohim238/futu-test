<?php

namespace App\Swagger\Models;

use Carbon\Carbon;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: 'Notebook',
    description: 'Notebook model',
    xml: new OA\Xml(
        name: 'Notebook'
    )
)]
class Notebook
{
    #[OA\Property(
        title: 'id',
        description: 'id',
        format: 'int64',
        example: 1,
    )]
    private int $id;

    #[OA\Property(
        title: 'full_name',
        description: 'ФИО',
        example: 'Rachelle Homenick'
    )]
    public string $full_name;

    #[OA\Property(
        title: 'company',
        description: 'Кампания',
        example: 'Logic'
    )]
    public string $company;

    #[OA\Property(
        title: 'phone',
        description: 'Номер телефона',
        example: '352.662.4600'
    )]
    public string $phone;

    #[OA\Property(
        title: 'email',
        description: 'Почта',
        example: 'mary.rath@yahoo.com'
    )]
    public string $email;

    #[OA\Property(
        title: 'birth_date',
        description: 'Дата рождения',
        example: '1976-08-09'
    )]
    public Carbon $birth_date;

    #[OA\Property(
        title: "Created at",
        description: "Created at",
        type: "string",
        format: "datetime",
        example: "2020-01-27 17:50:45",
    )]
    private Carbon $created_at;

    #[OA\Property(
        title: "Updated at",
        description: "Updated at",
        type: "string",
        format: "datetime",
        example: "2020-01-27 17:50:45",
    )]
    private Carbon $updated_at;
}
