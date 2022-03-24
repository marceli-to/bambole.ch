<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class BackerStoreRequest extends FormRequest
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
      'phone' => 'required',
      'email' => 'required|email',
      'duty_id' => 'required|exists:App\Models\Duty,id'
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
      'name.required' => 'Vorname wird benötigt!',
      'phone.required' => 'Name wird benötigt!',
      'email.required' => 'E-Mail wird benötigt!',
      'email.email' => 'E-Mail ist ungültig!',
      'duty_id.required' => 'Funktion wird benötigt!',
      'duty_id.exists' => 'Funktion nicht vorhande!',
    ];
  }
}
