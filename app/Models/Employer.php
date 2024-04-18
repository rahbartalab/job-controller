<?php

namespace App\Models;

use App\Contracts\HasDataInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model implements HasDataInterface
{
    use HasFactory;

    public function data(): array
    {
        // TODO: Implement data() method.
    }
}
