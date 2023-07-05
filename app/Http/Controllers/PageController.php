<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Faq;
use App\Models\Band;
use Illuminate\Http\Request;

class PageController extends BaseController
{
  protected $viewPath = 'pages.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show the homepage
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $data = [
      'faqs' => Faq::published()->get(),
      'bands' => Band::published()->soli()->with('stage')->orderBy('order')->get(),
      // 'bands_dayone' => Band::published()->dayOne()->with('image','stage')->orderBy('order')->get(),
      // 'bands_daytwo' => Band::published()->dayTwo()->with('image', 'stage')->orderBy('order')->get()
    ];

    return view($this->viewPath . 'index', $data);
  }

  /**
   * Show the detail page of a band
   *
   * @param Band $band
   * @return \Illuminate\Http\Response
   */

  public function show(Band $band, $slug = NULL)
  {
    $band = Band::with('image', 'stage')->findOrFail($band->id);
    return view($this->viewPath . 'show', ['band' => $band, 'browse' => $this->getBrowse($band)]);
  }

  protected function getBrowse(Band $band)
  {
    $bands = Band::published()->orderBy('day')->orderBy('order')->get();
    $keys = [];
    foreach($bands as $b)
    {
      $keys[] = (int) $b->id;
    }

    $key = array_search($band->id, $keys);

    if ($key == 0)
    {
      $prevId = end($keys);
      $nextId = isset($keys[$key+1]) ? $keys[$key+1] : NULL;
    }
    else if ($key == count($keys) - 1)
    {
      $prevId = $keys[$key-1];
      $nextId = $keys[0];
    }
    else
    {
      $prevId = $keys[$key-1];
      $nextId = $keys[$key+1];
    }

    $items = [
      'prev' => Band::find($prevId),
      'next' => Band::find($nextId),
    ];
   
    return $items;
  }

}
