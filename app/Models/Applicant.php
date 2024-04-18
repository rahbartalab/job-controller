<?php

namespace App\Models;

use App\Contracts\HasDataInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $password
 * @property mixed $name
 * @property mixed $isActive
 */
class Applicant extends Authenticatable implements HasDataInterface
{
    use HasFactory;
    use HasApiTokens;

    protected $guarded = [];

    public function isActive(): Attribute
    {
        $requiredFields = [
            'name',
            'email',
            'jobTitle',
//            'resumeFile',
            'gender'
        ];

        $notCompleted = array_filter($this->only($requiredFields), fn($field) => is_null($field));

        return Attribute::make(
            get: fn() => empty($notCompleted)
        );
    }

    public function data(): array
    {
        return [
            'name' => $this->name,
            'role' => 'applicant',
            'isActive' => $this->isActive
        ];
    }
}
