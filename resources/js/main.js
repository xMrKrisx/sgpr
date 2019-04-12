$('#submit').click(function() {
    var doc = new jsPDF('p', 'mm', 'a4'); // Hiermee geven we aan dat we een nieuwe instantie willen maken
    // Hier worden eigenlijk de meest simpele bestands opties mee gegeven. Zoals lettertype en lettergroote.
    
    doc.addImage($('#pdfBG').attr('value'), 'JPEG', 0,0,220,297);
    doc.setFont('helvetica');
    doc.setFontSize(9);

    // Hier worden alle waardes opgehaald uit het formulier
    var name = $('#name').val();
    var week = $('#week').val();
    var project = $('#project').val();
    var company = $('#company').val();
    var description = $('#description').val();
    var timefrom = $('#timefrom').val();
    var timetill = $('#timetill').val();

    // De informatie word voorzien van een soort label
    var name = "Naam: " + name + "";
    var week = "Week: " + week + "";
    var project = "Project: " + project + "";
    var company = "Opdrachtgever: " + company + "";
    var description = "Beschrijving: " + description + "";
    var worktime = "Van: " + timefrom + " - tot: " + timetill + ""; 
    

    // Hier worden alle bovengenoemde variabelen op het pdf 'gepositioneerd'.
    doc.text(55, 15, name);
    doc.text(55, 22, week);
    doc.text(55, 29, project);
    doc.text(55, 36, company);
    doc.text(30, 50, description);
    doc.text(30, 90, worktime);

    var pdf = doc.output('blob', 'filename');
    
    // Hier word een dynamisch form gemaakt met de keys en values uit het formulier.
    var data = new FormData();
    data.append('data', pdf);

    // Hier word een API in de vorm van een object gecreërd 
    var xhr = new XMLHttpRequest();

    // De /sendPDF post request word in de web.php afgevangen
    xhr.open('post', '/sendPDF', true);

    // De handeler voor het succesvol plaatsen of error bericht
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE) {
            $('#errormessage').addClass('succes');
            $('#error').append('Het bestand is succesvol geüpload'); 
            window.setTimeout(function() {
                window.location.href = "/";
            }, 7500);
        } else {
            $('#errormessage').addClass('error');
            $('#error').append('Het bestand is niet succesvol geüpload'); 
        } 
    }

    // Hier word de token aan het formulier toegevoegd, zonder deze word het versturen van het formulier omgezet in een server session error
    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content')); 

    // Hier word het object dat is gecreërd verstuurd van de website naar de server
    xhr.send(data);
});