    <!--extend layout master.blade.php -->
    @extends('layouts.master')


    
<!--setzt den Wert für den Abschnittstitel auf "Mini Twitter" (der Abschnittstitel wird als Ausbeute in messages.blade.php verwendet) -->
    @section('title', 'Dinge die dir spass machen !')

   


    <!--startet den Abschnittsinhalt, definiert den Titel für den Abschnitt und definiert auch etwas HTML für den Abschnittsinhalt
    (html ist zwischen section... und endsection) section content wird als yield in messages.blade.php verwendet) -->
    @section('content')


    <h2>Beschreibung Details:</h2>
    <h3>{{$entry->title}}</h3>
    <p>{{$entry->contend}}</p><br>
    <p>{{$entry->additive}}</p>
    

    <form action="/entry/{{$entry->id}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>

    @endsection

   <!--<h1><a href="/entry">Dinge die ich Mag !</a></h1>
   <p>Zeige hier Dinge die dir spass machen oder dier Gefallen.</p>-->

    


