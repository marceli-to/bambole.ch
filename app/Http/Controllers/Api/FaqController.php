<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Faq;
use App\Http\Requests\FaqStoreRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
{
  /**
   * Get a list of faqs
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(Faq::published()->get());
    }
    return response()->json(Faq::orderBy('title', 'ASC')->get());
  }

  /**
   * Get a single faq
   * 
   * @param Faq $faq
   * @return \Illuminate\Http\Response
   */
  public function find(Faq $faq)
  {
    $faq = Faq::findOrFail($faq->id);
    return response()->json($faq);
  }

  /**
   * Store a newly created faq
   *
   * @param  \Illuminate\Http\FaqStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(FaqStoreRequest $request)
  {
    $faq = Faq::create($request->all());
    $faq->save();
    return response()->json(['faqId' => $faq->id]);
  }

  /**
   * Update a faq for a given faq
   *
   * @param Faq $faq
   * @param  \Illuminate\Http\FaqStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Faq $faq, FaqStoreRequest $request)
  {
    $faq = Faq::findOrFail($faq->id);
    $faq->update($request->all());
    $faq->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given faq
   *
   * @param  Faq $faq
   * @return \Illuminate\Http\Response
   */
  public function toggle(Faq $faq)
  {
    $faq->publish = $faq->publish == 0 ? 1 : 0;
    $faq->save();
    return response()->json($faq->publish);
  }

  /**
   * Remove a faq
   *
   * @param  Faq $faq
   * @return \Illuminate\Http\Response
   */
  public function destroy(Faq $faq)
  {
    $faq->delete();
    return response()->json('successfully deleted');
  }
}
