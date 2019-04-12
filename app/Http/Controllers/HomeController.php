<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request; 
use Datatables;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    public function index()
    {
        $files = HomeController::retrieveFiles();
        // Kleine opsomming van de tabel in de database, deze word gebruikt voor het plaatsen van bestanden.
        $companys = ['Knipscheer B.v.', 'BAM Nederland', 'Breda Bouw'];

        // De bovenstaande variables worden hieronder beschikbaar gesteld aan de page testform
        return view('welcome', [
            'files' => $files,
            'companys' => $companys
        ]);
    }

    public function getForm() 
    {
        $files = HomeController::retrieveFiles();
        // Bestanden die we gebruiken voor het aanmaken voor de automatische aanvulling
        $companys = ['Knipscheer B.v.', 'BAM Nederland', 'Breda Bouw'];
        $projects = ['Straatje leggen', 'Stoep vervangen', 'Bushalte verleggen'];
        
        // De bovenstaande variables worden hieronder beschikbaar gesteld aan de page testform
        return view('testform', [
            'files' => $files,
            'companys' => $companys,
            'projects' => $projects,
        ]);
    }
    
    public function processForm(Request $request)
    {
        // Hiermee word de tijdelijke copy van het bestand opgehaald. 
        $fileData = $_FILES['data'];
        
        $random = Str::random(5);

        // Dit is de string die normaal uit de database word gehaald.
        // Voor nu is het gekopieerd uit een database en in een variable geplaatst.
        $pathTo = 'e5OqQlIZ7VxKbshIVNPj' . $random;
        $date = date("d-m-y");

        // Hier word de bestandsnaam gecreerd met de opgegeven variabele. Met de unieke string.
        $fname = $date . "-" . $pathTo . ".pdf";
        $path = "personalreceipts/";

        // Als er geen fileData is, word je teruggestuurd naar de hoofdpagina
        if (isset($fileData)) {
            header('location: /');
        }

        // Het tijdelijke bestand word verplaats naar de gedefineerde map met de gedefineerde bestandsnaam.
        move_uploaded_file($fileData['tmp_name'], $path . $fname);

    }

    public static function retrieveFiles() 
    {
        // Unieke string die normaal in de database staat
        $userPath = "e5OqQlIZ7VxKbshIVNPj";

        // Fallback optie als de vraag niet voldoet aan de voorwaarden
        $filePath = []; 

        // Pad naar de bestanden
        $path = 'personalreceipts/';

        // Hiermee geven we aan dat we het opgegeven pad willen scannen voor bestanden met een .pdf extensie
        $files = preg_grep('~\.(pdf)$~', scandir($path));

        if(! empty($files)) {
            foreach ($files as $file) {
                // Hier word de uniek gegenereerde database string vergeleken met de bestandsnaam.
                // Als de gebruiker zijn unieke string overeen komt met de bestandsnaam, word het weergeven.
                if(strpos($file, $userPath) !== false) {
                    $filePath[] = $path . $file;
                }
            }
        }
        // Hiermee geven we de filePath variabele terug aan de pagina.
        return($filePath);
    }
}
