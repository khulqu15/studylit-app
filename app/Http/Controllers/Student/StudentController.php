<?php

namespace App\Http\Controllers\Student;

use App\Actions\Student\CreateStudent;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class StudentController extends Controller
{
    public function formIndex(): Response
    {
        return Inertia::render('Student/Form');
    }

    public function formStore(Request $request, CreateStudent $action): RedirectResponse
    {
        $student = $action->store($request->all());
        var_dump($student);
        exit;
        return redirect()->route('photo-profile.form');
    }
}
