<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Notes;

class SubjectsController extends Controller
{
    //
    public function listar(){
        $subjects=Subject::all();
        return view('app_html.academic_assistant',['subject'=>$subjects]);

    }
    public function create()
    {
        //Create Subject Form
        return view('app_html.createSubject');
    }
    public function store(Request $request)
    {
        //Save Subjects
        Subject::create($request->all());
        Notes::create($request->all());
        return redirect()->route('subject.home');
    }
    //Display the specific resource
    public function show($id)
    {
        //
    }
    //Edit Specific Subject
    public function edit($id)
    {
        //
        $subject=Subject::find($id);
        return view('app_html.editSubject',['subject'=>$subject]);
    }
    public function update(Request $request, $id)
    {
        //
        Subject::find($id)->update($request->all());
        Notes::find($id)->update($request->all());
        return redirect()->route('subject.home');
    }

    //Delete Specific Subject
    public function delete($id){
        Subject::destroy($id);
        return redirect()->route('subject.home');
    }
    public function destroy($id)
    {
        //
    }
}
