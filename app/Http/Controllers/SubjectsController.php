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
    //show notes for subject
    public function showNotes($id){
        $notes=Notes::where('subject_id',$id)->get();
        $subject=Subject::find($id);
        return view('app_html.showNotes',['notes'=>$notes],['subject'=>$subject]);
    }
    public function createNote(Request $request,$id)
    {
        //
        $name = $request->get('name_note');
        $qualification = $request->get('qualification');
        $percentage = $request->get('percentage');
        $subject_id = $request->get('subject_id');

        $nota = new Notes();

        $nota->name_note=$name;
        $nota->qualification=$qualification;
        $nota->percentage=$percentage;
        $nota->subject_id=$subject_id;

        $nota->save();
        
        //Notes::create($request->all());
        $subject=Subject::find($id);
        $notes=Notes::where('subject_id',$subject->id)->get();
        $suma=0;
        $count=0;
        foreach($notes as $notes){
            $count+=1;
            $suma=$suma+$notes->qualification;
        }
        $average=$suma/$count;
        $subject->update(['average'=>$average]);
        return redirect()->route('subject.show',['subject'=>$subject]);
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
