<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConsumerProspectionRequest extends FormRequest
{
	//TODO: Auth::check()
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
			'categories' => ['required', 'array'],
			'firstname' => ['required', 'string', 'max:50'],
			'lastname' => ['required', 'string', 'max:100'],
			'email' => ['required', 'string', 'email:rfc,dns'],
			'phone' => ['required', 'string', 'min:14', 'max:14'],
			'contactpreference' => ['required', 'in:email,phone,whatsapp'],
			'address' => ['required', 'string', 'max:255'],
			'complement' => ['sometimes', 'nullable', 'string', 'max:255'],
			'state' => ['required', 'string'],
			'city' => ['required', 'string', 'max:255'],
			'zipcode' => ['required', 'numeric', 'digits:5'],
        ];
    }
}
