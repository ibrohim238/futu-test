<?php

namespace App\Swagger\Request;

use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Notebook request",
    description: "Notebook request body data",
    required: ["full_name", "phone", "email"],
    type: "object",
)]
class NotebookRequest
{
    #[OA\Property(
        title: "full_name",
        description: "full_name of the new Notebook",
        example: "A nice Notebook"
    )]
    public string $full_name;

    #[OA\Property(
        title: "company",
        description: "Company of the new Notebook",
        example: "This is new Notebook's company",
    )]
    public string $company;

    #[OA\Property(
        title: "phone",
        description: "Phone of the new Notebook",
        example: "+7(999)999 99-99",
    )]
    public string $phone;

    #[OA\Property(
        title: "email",
        description: "Email of the new Notebook",
        example: "example@hotmail.com",
    )]
    public string $email;

    #[OA\Property(
        title: "birth_date",
        description: "birth_date of the new Notebook",
        type: "date",
        format: "date",
        example: "1999-1-1",
    )]
    public string $birth_date;
}
