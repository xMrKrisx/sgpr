@extends("layouts.app")

@section('content')
<div id="errormessage">
    <p id="error"></p>
</div>
<!-- Het formulier wat behandeld word -->
    <form action="">
        @csrf <!-- Laravel vereist voor elke post request, dat er een unieke token word gegenereerd -->

        <input type="hidden" id='pdfBG' value="<?php include('images/pdf-bg.jpg'); ?>">

        <p>Naam: <input type="text" name='name' id="name" required></p>
        <p>Week nummer: <input type="week" name="week" id="week" required></p>
        <p>Project: <select type="text" name="project" id="project">
               
            @foreach($projects as $project)
                <option>{{ $project }}</option>
            @endforeach
        </select></p>
        <p>Werkgever: <select type="text" name="company" id="company">
            @foreach($companys as $company) 
                <option> {{ $company }}</option>
            @endforeach
        </select></p>
        <p>Beschrijving: <textarea name="description" id="description" cols="30" rows="5"></textarea></p>
        <p>Gewerkt van: <input type="time" name="timefrom" id="timefrom"> - Gewerkt tot: <input type="time" name='timetill' id='timetill'></p>
        <p><a id="submit" class=" btn btn-primary">Send PDF</a> <a href='{{ url('') }}' class="btn btn-primary">Ga terug</a></p>
    </form>
@endsection