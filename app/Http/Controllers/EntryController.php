<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;



class EntryController extends Controller
{
//-------------------------------Grundstruktur--------------------------------------------------------------------------
    public function showAll() {


        
        // erhält alle Einträge aus Tabellennachrichten
        // und erhält ein Array von Objekten als Rückgabewert.
        // diesen Rückgabewert speichern wir in der Variablen $messages
        $entriesList = Entry::all()->sortByDesc('created_at');
 
 
        
        // Diese Zeile würde die Meldungen im UI/Browser ausgeben
        // und die Ausführung des Skripts stoppen.
        // gut zum debuggen ;o)
        //dd($entry);
 
 
        
        // Diese Funktion gibt eine Ansicht zurück.
        // hier wirkt die Blade-Template-Engine wieder
        // durch die wir das Array $messages an die Ansicht übergeben können.
        // wir können es als optionalen zweiten Parameter übergeben (
        // assoziatives Array)
        //first ernty = entry.blade.php //ertry 2 = Varialbel //entry 3 = Variabel in Controller
        return view('entry', ['entries' => $entriesList]);
  
    }
//--------------------------------Eintrag hinzufügen-------------------------------------------------------------------------
   
    public function create(Request $request) {


        // wir erstellen ein neues Message-Objekt
        $entry = new Entry();
        // Wir setzen die Eigenschaften title, content und additive
        // mit den Werten, die wir in der Post-Anfrage erhalten haben
        $entry->title = $request->title;
        $entry->contend = $request->contend;
        $entry->additive = $request->additive;
   
        
        // Wir speichern das neue Message-Objekt in den Nachrichten
        // Tabelle in unserer Datenbank
        $entry->save();
   
        //Am Ende machen wir eine Umleitung auf die URL /messages
        return redirect('/entry');        
    }
 
//---------------------------------Eintrag Detail-------------------------------------------------------------------------- 
    public function details($id) {


        // frage die Datenbank nach der Nachricht mit der ID, die wir bekommen haben
        // als Parameter. Es ist die gleiche ID, die wir früher hatten
        // Generiere die Links zu den Nachrichtendetails
        // und dieselbe ID, die web.php aus dem Link entnommen hat und
        // "weitergegeben" an die Steuerung 
        $entry = Entry::findOrFail($id);
    
        
        // Wir geben die Ansicht messageDetails.blade.php zurück
        // und wir übergeben ihm auch das Message-Object, das wir bekommen haben
        // zurück von der Funktion findOrFail  
        return view('entryDetails', ['entry' => $entry]);
    }
    //---------------------------------Eintrag Löschen-------------------------------------------------------------------------- 
    public function delete($id) {


        // frage die Datenbank nach der Nachricht mit der ID, die wir bekommen haben
        // als Parameter. Es ist die gleiche ID, die wir früher hatten
        // Generiere die Links zu den Nachrichtendetails
        // und die gleiche ID, die web.php aus dem Link genommen hat.
        // dann rufen wir direkt die delete-Methode von auf
        // das Message-Objekt, das wir von der zurückbekommen
        // findOrFail-Funktion.
        $result = Entry::findOrFail($id)->delete();
 
        // Danach leiten wir wieder zur Nachrichtenliste weiter
        return redirect('/entry');        
    } 
 

}
