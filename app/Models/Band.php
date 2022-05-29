<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Base
{
  use HasFactory;
  
	protected $fillable = [
    'name',
    'description',
    'website',
    'youtube',
    'day',
		'time_start',
		'time_end',
    'order',
    'publish',
    'stage_id'
	];

  protected $appends = [
    'time_start_full',
    'time_end_full',
  ];

  
  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  public function image()
  {
    return $this->morphOne(Image::class, 'imageable')->where('publish', 1);
  }

  public function stage()
  {
    return $this->hasOne(Stage::class, 'id', 'stage_id');
  }

	/**
   * Scope for bands on day one
   */

	public function scopeDayOne($query)
	{
		return $query->where('day', 1);
	}
  
	/**
   * Scope for bands on day two
   */

	public function scopeDayTwo($query)
	{
		return $query->where('day', 2);
	}

  /**
   * Accessor for time
   * @param Date $value
   */

  public function setTimeStartAttribute($value)
  {
    $this->attributes['time_start'] = $value ? $value : NULL;
  }

  /**
   * Accessor for time
   * @param Date $value
   */

  public function setTimeEndAttribute($value)
  {
    $this->attributes['time_end'] = $value ? $value : NULL;
  }

  /**
   * Mutator for time
   * 
   */

  public function getTimeStartFullAttribute()
  {
    return date('H.i', strtotime($this->time_start));
  }

    /**
   * Mutator for time
   * 
   */

  public function getTimeEndFullAttribute()
  {
    return date('H.i', strtotime($this->time_end));
  }

}
