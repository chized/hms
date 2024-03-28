<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    $formFields = $request->validate([
        'surname' => 'required',
        'firstname' => 'required',
        'other_names' => 'required',
        'registration_no' => ['required', Rule::unique('events','registration_no')],
        'parent_id' => 'required',
        'age' => 'required',
        'class' => 'required',
        'gender' => 'required',
        'parent_email' => ['required','email'],
        'tags' => 'required'
    ]);
}
