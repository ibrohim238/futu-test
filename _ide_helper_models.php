<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Notebook
 *
 * @property int $id
 * @property string $full_name
 * @property string|null $company
 * @property string $phone
 * @property string $email
 * @property string|null $birth_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\NotebookFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notebook whereUpdatedAt($value)
 */
	class Notebook extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

