<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
  /**
   * Get a list of backer types
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Stage::orderBy('name', 'ASC')->get());
  }

  /**
   * Get a single backer type
   * 
   * @param Stage $stage
   * @return \Illuminate\Http\Response
   */
  public function find(Stage $stage)
  {
    $stage = Stage::find($stage->id);
    return response()->json($stage);
  }
}
