<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nim', 'nama', 'prodi', 'semester'])]
class Mahasiswa extends Model {}
