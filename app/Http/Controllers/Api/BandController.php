<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Band;
use App\Models\Image;
use App\Http\Requests\BandStoreRequest;
use Illuminate\Http\Request;

class BandController extends Controller
{
  /**
   * Get a list of bands
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    $bands = Band::soli()->with('stage')->orderBy('order')->get();
    return response()->json([
      'soli' => $bands,
    ]);

    // $bands_dayone = Band::dayOne()->with('stage')->orderBy('order')->get();
    // $bands_daytwo = Band::dayTwo()->with('stage')->orderBy('order')->get();
    // return response()->json([
    //   'dayone' => $bands_dayone,
    //   'daytwo' => $bands_daytwo
    // ]);
  }

  /**
   * Get a single band
   * 
   * @param Band $band
   * @return \Illuminate\Http\Response
   */
  public function find(Band $band)
  {
    $band = Band::with('images', 'stage')->find($band->id);
    return response()->json($band);
  }

  /**
   * Store a newly created band
   *
   * @param  \Illuminate\Http\BandStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(BandStoreRequest $request)
  {
    $band = Band::create($request->all());
    $band->save();
    $this->handleImages($band, $request->input('images'));
    return response()->json(['bandId' => $band->id]);
  }

  /**
   * Update a band for a given band
   *
   * @param Band $band
   * @param  \Illuminate\Http\BandStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Band $band, BandStoreRequest $request)
  {
    $band = Band::findOrFail($band->id);
    $band->update($request->all());
    $band->save();
    $this->handleImages($band, $request->input('images'));
    return response()->json('successfully updated');
  }


  /**
   * Toggle the status a given band
   *
   * @param  Band $band
   * @return \Illuminate\Http\Response
   */
  public function toggle(Band $band)
  {
    $band->publish = $band->publish == 0 ? 1 : 0;
    $band->save();
    return response()->json($band->publish);
  }

  /**
   * Remove a band
   *
   * @param  Band $band
   * @return \Illuminate\Http\Response
   */
  public function destroy(Band $band)
  {
    $band = Band::with('images')->find($band->id);
    $band->images()->delete();
    $band->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Update the order of the given grid item
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $items = $request->get('items');
    foreach($items as $item)
    {
      $i = Band::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Handle associated images
   *
   * @param Band $band
   * @param Array $images
   * @return void
   */  

  protected function handleImages(Band $band, $images = NULL)
  {
    foreach($images as $image)
    {
      $img = Image::findOrFail($image['id']);
      $img->imageable_id = $band->id;
      $img->imageable_type = Band::class;
      $img->save();
    }
  }

}
