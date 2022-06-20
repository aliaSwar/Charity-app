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
            'status_id'      =>   ['required', 'numeric', 'exists:statuses,id'],
            'gender'           =>   ['required', 'string'],
            'age'              =>   ['required', 'numeric']
        ];
    }
    public function filter_entry()
    {
        if ($this->name != null) {
            $entries = Entry::where('family_name', 'like', '%' . $this->name . '%')
                ->where('all_orphan', false)
                ->where('category_id', $this->category_id)
                ->where('status_id', $this->status_id)
                ->where('financial_id',  $this->financial_id)
                ->get();
        } else {
            $entries = Entry::where('all_orphan', false)
                ->where('financial_id',  $this->financial_id)
                ->where('category_id', $this->category_id)
                ->where('status_id', $this->status_id)
                ->where('financial_id',  $this->financial_id)
                ->get();
        }
        return $entries;
    }
    public function filter_orphan()
    {
        $people =  array();
        foreach ($this->filter_entry() as $entry) {

            $is_orphan_number = 0;
            $is_orphan_mother = false;
            foreach (Person::where('entry_id',  $entry->id)->get() as $person) {
                if ($person->is_orphan == false and $person->category != 'الام'  and  $person->category != 'الأب') {
                    $is_orphan_number++;
                }
                if ($person->is_orphan == false and $person->category == 'الام') {
                    $is_orphan_mother = false;
                }
            }
            $people[] = collect(['entry' => $entry->id, 'is_orphan_number' => $is_orphan_number, 'is_orphan_mother' => $is_orphan_mother])->toArray();
            /* dd($people); */
        }
        return collect($people)->toArray();
    }
    public function filter_gender($entry_id)
    {
        if ($this->gander == 'الابن') {
            $people = Person::where('entry_id',  $entry_id)
                ->where('category', 'الابن')->get();
        } elseif ($this->gender == 'الابنة') {
            $people = Person::where('entry_id',  $entry_id)
                ->where('category', 'الابنة')->get();
        } else {
            $people = Person::where('entry_id',  $entry_id)
                ->whereIn('category', ['الابن', 'الابنة'])->get();
        }
        return $people;
    }
    public function filter_age($entry_id)
    {
        $people =  array();
        foreach ($this->filter_gender($entry_id) as $person) {
            $birthday = $person->birthday;
            $age = Carbon::parse($birthday)->diff(Carbon::now())->y;
            if ($age <= 5 and $this->age == 1) {
                array_push($people, $person);
            } elseif ($age > 5 and $age < 11 and $this->age == 2) {
                array_push($people, $person);
            } else {
                array_push($people, $person);
            }
        }
        return collect($people)->all();
    }
}
