@extends('layouts.app')

@section('content')


            <div class="title m-b-md">
                Homepagina
            </div>

            <div class="links">
                <!-- Link naar het formulier -->
                <a href="{{ Route('testform') }}">Open formulier</a>
            </div>
            <hr>
            <div class="links">
                
                <h3 id="message"><h3>
               
                
                <p> Bestanden: </p>
                <!-- Check of er bestanden in de directory zitten -->
                @if (empty($files))
                    <p>Er zijn geen bestanden gevonden</p>
                @endif
                
                <!-- Hier tuffen we elk bestand uit de map 1 voor 1 eruit, als het aan de voorwaarden uit de functie voldoet. -->
                @foreach($files as $file)
                <p><i class="far fa-file-pdf"></i><a id="doc" href="{{ $file }}" download>
                    <?= substr($file, 17, 8) ?>
                </a></p>
                @endforeach
            </div>
        </div>
    </div> 

@endsection