<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Duty;
use App\Models\Faq;
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
      //'duties' => Duty::orderBy('description')->get(),
      'faqs' => Faq::published()->get(),
    ];

    return view($this->viewPath . 'index', $data);
  }
}
