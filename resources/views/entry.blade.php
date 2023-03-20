
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
    <!--extend layout master.blade.php -->
    @extends('layouts.master')


    
<!--setzt den Wert für den Abschnittstitel auf "Mini Twitter" (der Abschnittstitel wird als Ausbeute in messages.blade.php verwendet) -->
    @section('title', 'Dinge die dir spass machen !')




    <!--startet den Abschnittsinhalt, definiert den Titel für den Abschnitt und definiert auch etwas HTML für den Abschnittsinhalt
    (html ist zwischen section... und endsection) section content wird als yield in messages.blade.php verwendet) -->
    @section('content')

    <h2>Kreiere eine neue Nachricht: </h2>


    <form action="/create" method="post">
       <input type="text" name="title" placeholder="Themen Titel">
       <input type="text" name="contend" placeholder="Beschreibung der Sache">
       <input type="text" name="additive" placeholder="Bemerkungen">
       <!-- diese Blade-Direktive ist für alle Formularposts irgendwo dazwischen notwendig
           die Formular-Tags -->
       @csrf
       <button type="submit">Eingabe</button>
    </form>
    
    
    <h2>Vorhandene Einträge:</h2>

        <h2>Beiträge:</h2>

        <ul>
            <!-- durchläuft die $entries, die dieses Blade-Template enthält
            erhält von EntryController.php. für jedes Element der Schleife, die
            wir rufen $entry auf, wir drucken die Eigenschaften (Titel, Inhalt
            und created_at in einem <li>-Element -->
            @foreach ($entries as $entry) 
                <li>
                    <b>
                        <a href="/entries/{{$entry->id}}">{{$entry->title}}:</a></b>
                    <br>
                    {{$entry->contend}}<br>
                    {{$entry->additive}}<br>
                    {{$entry->created_at->diffForHumans()}}   
                      
                </li>
                <br>
            @endforeach
        </ul>
        <br>



    


    @endsection

   <!--<h1><a href="/entry">Dinge die ich Mag !</a></h1>
   <p>Zeige hier Dinge die dir spass machen oder dier Gefallen.</p>-->
</body>
</html>