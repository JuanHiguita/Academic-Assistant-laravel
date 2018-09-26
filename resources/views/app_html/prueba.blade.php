@extends('layout')
@section('contenido')

    <div class="row">
        <div class="col-12">
            <h3>Create a new Subject</h3>

            <form method="POST" action="{{route('notes.store')}}" role="form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name_note">Name Note</label>
                    <input type="tetx" name="name_note" class="form-control" id="name_note" placeholder="Name of Note">
                    <label for="qualification">Qualification</label>
                    <input type="number" name="qualification" class="form-control" id="qualification" placeholder="Quialification">
                    <label for="percentage">Percentage</label>
                    <input type="number" name="percentage" class="form-control" id="percentage" placeholder="percentage">
                    
                </div>
                <input type="button" class="btn btn-primary" id="btnAddNote" value="Add Note">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

    </div>
@endsection