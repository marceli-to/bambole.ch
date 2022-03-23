<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Duty;
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
    $duties = Duty::orderBy('description')->get();
    return view($this->viewPath . 'index', ['duties' => $duties]);
  }

}
