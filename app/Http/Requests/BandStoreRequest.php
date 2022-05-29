<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class BandStoreRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required',
      'time_start' => 'required',
      'time_end' => 'required',
    ];
  }

  /**
   * Custom message for validation
   *
   * @return array
   */
  public function messages()
  {
    return [
      'name.required' => [
        'field' => 'title',
        'error' => 'Titel wird benötigt!'
      ],
      'time_start.required' => [
        'field' => 'time_start',
        'error' => 'Zeit Start wird benötigt!'
      ],
      'time_end.required' => [
        'field' => 'time_end',
        'error' => 'Zeit Ende wird benötigt!'
      ],
    ];
  }
}
