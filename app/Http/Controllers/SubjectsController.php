<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Notes;
use App\User;
class SubjectsController extends Controller
{
    //
    public function listar(){
        $user=auth()->user()->id;
        $subjects=Subject::where('user_id',$user)->get();
        
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
        
        $name = $request->get('name');
        $user_id = auth()->user()->id;

        $subject = new Subject();
        $subject->name=$name;
        $subject->user_id=$user_id;
        $subject->save();
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
        //Request for notes parameters 
        $name = $request->get('name_note');
        $qualification = $request->get('qualification');
        $percentage = $request->get('percentage');
        $subject_id = $request->get('subject_id');
        //create a note
        $nota = new Notes();
        $nota->name_note=$name;
        $nota->qualification=$qualification;
        $nota->percentage=$percentage;
        $nota->subject_id=$subject_id;
        //save note
        $nota->save();
        
        $subject=Subject::find($id);
        $notes=Notes::where('subject_id',$subject->id)->get();
        //average subject
        $suma=0;
        $max_percentage=0;
        foreach($notes as $notes){
            //$suma=$suma+$notes->qualification;
            if($notes->percentage<=100){
                if ($notes->percentage>=0){
                    if($max_percentage>=0){ 
                        if($max_percentage<=100){
                            $max_percentage=$max_percentage+$notes->percentage;
                            $suma=$suma+($notes->qualification*$notes->percentage);
                            }
                        }
                    }
                } 
            } 
        $average=$suma/100;
        $subject->update(['average'=>$average]);
        return redirect()->route('subject.show',['subject'=>$subject]);
    }

    //Delete Specific Subject
    public function delete($id){
        Subject::destroy($id);
        return redirect()->route('subject.home');
    }
    public function deleteNote($id){
        //$subject=Notes::all();
        $subject_id = Notes::find($id)->subject_id;
        Notes::destroy($id);
        
        //$subject->update(['average'=>$average]);
        return redirect()->route('subject.show',['subject_id'=>$subject_id]);
    }
    public function destroy($id)
    {
        //
    }
}
