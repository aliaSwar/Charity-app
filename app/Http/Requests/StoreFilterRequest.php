<?php

namespace App\Http\Requests;

use App\Models\Entry;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreFilterRequest extends FormRequest
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
            'name'             =>   ['string', 'min:4', 'exists:entries,family_name', 'nullable'],
            'financial_id'     =>   ['required', 'numeric', 'exists:financials,id'],
            'category_id'      =>   ['required', 'numeric', 'exists:categories,id'],
            'status_id'      =>     ['required', 'numeric', 'exists:statuses,id'],
            'gender'           =>   ['required', 'string'],
            'age'              =>   ['required', 'numeric']
        ];
    }
    public function filter_entry($id)
    {
        if ($this->name != null) {
            $entry = Entry::where('family_name', 'like', '%' . $this->name . '%')
                ->where('id', $id)
                ->where('all_orphan', false)
                ->where('category_id', $this->category_id)
                ->where('status_id', $this->status_id)
                ->where('financial_id',  $this->financial_id)
                ->first();
        } else {
            $entry = Entry::where('all_orphan', false)
                ->where('financial_id',  $this->financial_id)
                ->where('category_id', $this->category_id)
                ->where('status_id', $this->status_id)
                ->where('financial_id',  $this->financial_id)
                ->first();
        }
        return $entry  != null;
    }

    public function filter_age()
    {
        $people =  array();
        foreach (Person::where('orphan', false)
            ->where('category', $this->gender)
            ->get() as $person) {
            $birthday = $person->birthday;
            $age = Carbon::parse($birthday)->diff(Carbon::now())->y;
            ///dd($this->age);

            if ($age <= 5 and $this->age == 1) {

                $people[] = $person;
            } elseif ($age > 5 and $age < 11 and $this->age == 2) {
                $people[] = $person;
            } elseif ($this->age == 3) {
                $people[] = $person;
            }
        }
        return $people;
    }
}
