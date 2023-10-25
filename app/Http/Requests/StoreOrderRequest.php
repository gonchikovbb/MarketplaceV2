<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
//            'customer' => ['required', 'min:1', 'max:50'],
//            'phone' => ['required', 'min:1', 'max:255'],
//            'type' => 'required|in:online,offline',
//            'status' => 'required|in:active,completed,canceled',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" не должно быть пустым',
            'title.min' => 'Название должно быть не менее :min символов',
            'title.max' => 'Название должно быть не более :max символов',
            'description.required' => 'Поле "Описание" не должно быть пустым',
            'description.min' => 'Описание должно быть не менее :min символов',
            'description.max' => 'Описание должно быть не более :max символов',
            'status.required' => 'Пожалуйста, выберите статус задачи',
            'status.in' => 'Поле "Статус" имеет неверное значение',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Файл должен быть в формате jpeg, png, jpg или gif',
            'image.max' => 'Размер файла не должен превышать :max Кб',
            'tags.max' => 'Максимальная длина тега :max символов',
            'tags.required' => 'Поле "Тег" не должно быть пустым',
        ];
    }
}
