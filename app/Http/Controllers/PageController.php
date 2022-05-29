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
      'bands_dayone' => Band::published()->dayOne()->with('image','stage')->orderBy('order')->get(),
      'bands_daytwo' => Band::published()->dayTwo()->with('image', 'stage')->orderBy('order')->get()
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
    return view($this->viewPath . 'show', ['band' => $band]);
  }
}
