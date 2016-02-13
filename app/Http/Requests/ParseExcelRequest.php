<?php

namespace App\Http\Requests;


class ParseExcelRequest extends Request
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
            'excel' => 'required|mimes:csv,xls,xlsx,text/comma-separated-values, text/csv, text',
        ];
    }
}
