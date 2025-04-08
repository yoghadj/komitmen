<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        '1' => 'text',
        '2' => 'textarea',
        '3' => 'checkbox',
        '4' => 'radio',
        '5' => 'select',
    ];

    protected $fillable = [
        'komitmen_id',
        'question',
        'type',
        'is_required',
        'parent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function komitmen()
    {
        return $this->belongsTo(Komitman::class, 'komitmen_id');
    }
}
