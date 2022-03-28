<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Backer;
use App\Http\Requests\BackerStoreRequest;
use App\Events\BackerRegistration;
// use App\Exports\BackersExport;
// use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class BackerController extends Controller
{
  /**
   * Get a list of backers
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Backer::orderBy('name')->get());
  }

  /**
   * Get a single backers for a given backers
   * 
   * @param Backer $backer
   * @return \Illuminate\Http\Response
   */
  public function find(Backer $backer)
  {
    $backer = Backer::findOrFail($backer->id);
    return response()->json($backer);
  }

  /**
   * Store a newly created backer
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(BackerStoreRequest $request)
  {
    $backer = Backer::create($request->all());
    event(new BackerRegistration($backer));
    return response()->json(['backerId' => $backer->id]);
  }

  /**
   * Update a backer for a given backer
   *
   * @param Backer $backer
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(Backer $backer, BackerStoreRequest $request)
  {
    $backer = Backer::findOrFail($backer->id);
    $backer->update($request->all());
    $backer->save();
    return response()->json('successfully updated');
  }

  /**
   * Remove a backer
   *
   * @param  Backer $backer
   * @return \Illuminate\Http\Response
   */
  public function destroy(Backer $backer)
  {
    $backer->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Export a list of backers to xls
   *
   * @return \Illuminate\Http\Response
   */
  public function export()
  {
    return Excel::download(new BackersExport, 'backers.xlsx');
  }
}
