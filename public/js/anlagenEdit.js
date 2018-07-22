function genJson()
{
    let elements = document.getElementById("form").elements;
    let result = [].reduce.call(elements, (data, element) =>
    {
        if (element.name && element.name !== "" && element.value && element.value !== "")
        {
            data[element.name] = element.value;
        }
        return data;
    }, {});

    result.files = [];
    result.files = window.tmpFiles;
    return result;
}

function printForm()
{
    let printerWindow = window.open('', 'PRINT');

    function write(text, id, post = "")
    {
        printerWindow.document.write(text + ": " + "<b>" + $("#" + id).val() + "</b>" + post + "<br>");
    }

    printerWindow.document.write('<html><head><title>' + document.title + '</title>');
    printerWindow.document.write('</head><body >');
    printerWindow.document.write('<h1>' + document.title + '</h1>');
    write("Rekers Krannummer", "craneId");
    write("Kranbezeichnung", "type");
    write("Hersteller", "manufactor");
    write("Krantyp", "craneType");
    write("Krannummer - Hersteller", "manufactorCraneNumber");
    write("Fabriknummer des Hauptwerks:", "liftingGearFactoryNumber");
    write("Hubwerksbezeichnung", "liftingGearDesignation");
    write("Triebwerksgruppe", "engineGroup");
    write("Ausführung Seil", "ropeModel");
    write("Seilnenndurchmesser", "ropeDiameter");
    write("Seillänge", "ropeLength");
    write("Steuerung", "control");
    write("Tragfähigkeit der Katze", "loadCapacityCat");
    write("Tragfähigkeit der Brücke", "craneId");
    write("Gesamtgewicht inkl. Katze", "loadCapacityBridge");
    write("Spannweite", "span");
    write("Laufraddurchmesser des Katzfahrwerks", "impellerDiameterCat");
    write("Laufraddurchmesser des Kranfahrwerks", "impellerDiameterCrane");
    write("Standort", "location");
    write("Hallennummer", "hallNumber");
    write("Tätigkeitsbereich", "FieldOfActivity");
    write("Baujahr", "construtionYear");
    write("Anteil der Generalüberholung", "proportionOfOverhaul");
    write("Anteil der Generalüberholung", "span");
    write("Zusätzliche Anmerkungen", "remarks");

    printerWindow.document.write('</body></html>');

    printerWindow.document.close(); // necessary for IE >= 10
    printerWindow.focus(); // necessary for IE >= 10*/

    printerWindow.print();
    printerWindow.close();
}

function onFilesLoaded()
{
    let submitButton = $("#submitButton");
    submitButton.prop("disabled", false);
    submitButton.toggleClass("pushButton");
    submitButton.css("cursor", "pointer");

    let loadingStatus = $("#loadingStatus");

    loadingStatus.css("color", "green");
    loadingStatus.text("Dateien hochgeladen");
}

function fileHandler(event)
{

    let loaded = 0;
    let total = event.target.files.length;
    window.tmpFiles = [];

    let submitButton = $("#submitButton");
    submitButton.prop("disabled", true);
    submitButton.toggleClass("pushButton");
    submitButton.css("cursor", "not-allowed");

    let loadingStatus = $("#loadingStatus");
    loadingStatus.text("Lese Daten... Bitte warten!");

    for (let i = 0; i < event.target.files.length; i++)
    {
        let fileName = event.target.files[i].name;

        let reader = new FileReader();
        reader.onload = (file) =>
        {
            loaded++;
            window.tmpFiles[i] = {[file.target.fileName]: file.target.result};

            if (loaded === total)
            {
                onFilesLoaded();
            }
        };

        reader.onprogress = function (data)
        {
            if (data.lengthComputable)
            {
                let progress = parseInt(((data.loaded / data.total) * 100), 10);
                let loadingStatus = $("#loadingStatus");
                loadingStatus.css("color", "black");
                loadingStatus.text("Lade Datei " + fileName + " " + progress + "%");
            }
        };

        reader.fileName = fileName;
        reader.readAsDataURL(event.target.files[i]);
    }
}

function deleteFile(id, filename, event)
{
    $(event.target).parent().remove();

    // language=JQuery-CSS
    if ($("#uploadedFilesList").has("li").length === 0)
    {
        // language=JQuery-CSS
        $("#uploadedFiles").remove();
    }
    parent.deleteAnalagenFileDB(id, filename);
}