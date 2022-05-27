<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePersonRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name'         => ['required', 'string', 'min:5'],
            'birthday'          => ['date'],
            'phone'             => ['required', 'numeric', 'digits:11'],
            'work'              => ['required', Rule::in(['work', 'dont work'])],
            'status'            => ['required', Rule::in('existing', 'not existing')],
            'category'          => ['required', Rule::in('mother', 'father', 'boy', 'girl')],
            'family_status'     => ['required', Rule::in('single', 'married', 'separate', 'window')],
            'educational_level' => ['required', Rule::in('امي', 'أول', 'ثاني', 'ثالث', 'رابع', 'خامس', 'سادس', 'سابع', 'ثامن', 'تاسع', 'عاشر', 'حادي عشر', 'بكلوريا', 'جامعي')],
            'entry_id'          => ['required', 'numeric', 'exists:entries,id'],
            'orphan_id'         => ['numeric', 'exists:orphans,id'],
            'health_status'     => ['required', 'string', 'min:3', 'max:1000'],
            'number_id'         => ['numeric', 'digits:11']
        ];
    }
}
