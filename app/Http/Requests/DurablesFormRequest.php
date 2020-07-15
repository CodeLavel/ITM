<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DurablesFormRequest extends FormRequest
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
        $rules = [
            'photo' => ['file','nullable'],
            'duID' => 'string|min:1|nullable',
            'category_id' => 'nullable',
            'catagory_id' => 'nullable',
            'du_name' => 'string|min:1|nullable',
            'brand' => 'string|min:1|nullable',
            'gen' => 'string|min:1|nullable',
            'amount' => 'string|min:1|nullable',
            'break' => 'string|min:1|nullable',
            'use' => 'string|min:1|nullable',
        ];

        return $rules;
    }

    /**
     * Get the request's data from the request.
     *
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['duID', 'category_id', 'catagory_id', 'brand', 'gen', 'du_name', 'amount' , 'break', 'use']);
        if ($this->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($this->hasFile('photo')) {
            $data['photo'] = $this->moveFile($this->file('photo'));
        }



        return $data;
    }

    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }

        $path = config('codegenerator.files_upload_path', 'uploads');

        $path = config('laravel-code-generator.files_upload_path', 'uploads');

        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
