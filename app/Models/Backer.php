<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backer extends Base
{
  use HasFactory;

	protected $fillable = [
    'name',
    'phone',
    'email',
    'duty_id',
	];

  protected $casts = [
    'created_at' => 'date:d.m.Y',
    'updated_at' => 'date:d.m.Y',
  ];

  public function duty()
  {
    return $this->hasOne(Duty::class, 'id', 'duty_id');
  }
}
