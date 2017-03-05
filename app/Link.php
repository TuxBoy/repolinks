<?php

namespace App;

use App\TuxBoy\Priority;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed priority
 */
class Link extends Model
{
    protected $fillable = ['url', 'favory', 'user_id', 'priority', 'description'];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
    public function user()
    {
      return $this->belongsTo(User::class);
    }

  /**
   * Permet d'ajouter le http:// � une url si elle en a pas.
   *
   * @param $url   string
   * @return string
   */
    public function getUrlAttribute($url)
    {
      if (strrpos($url, 'http') === false) {
        return 'http://' . $url;
      }
      return $url;
    }

  /**
   * Permet d'afficher le nom de la classe pour la vu suivant la valeur de "priority"
   */
    public function showPriority() : string
    {
      return isset(Priority::$ACTION[$this->priority])
        ? Priority::$ACTION[$this->priority]
        : 'action';
    }

  /**
   * @param Builder $query
   * @return Builder
   */
    public function scopeLinksByOrder(Builder $query)
    {
      return $query->orderBy('created_at', 'desc');
    }

}
