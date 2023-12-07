function miesiacStrPL(curr_month)
{
    switch (curr_month + 1)
    {
        case 1:
            return "styczeń";
        case 2:
            return "luty";
        case 3:
            return "marzec";
        case 4:
            return "kwiecień";
        case 5:
            return "maj";
        case 6:
            return "czerwiec";
        case 7:
            return "lipiec";
        case 8:
            return "sierpień";
        case 9:
            return "wrzesień";
        case 10:
            return "październik";
        case 11:
            return "listopad";
        case 12:
            return "grudzień";
    }
}
function gettheDate()
{
    Today = new Date();
    TheDate = "" + Today.getDate() +" / "+ (Today.getMonth() + 1)+ "(" + miesiacStrPL(Today.getMonth()) + ")" + " / " +
        (Today.getYear()-100) + "r.";
    document.getElementById("data").innerHTML = TheDate;
}

let stoperID = null;
let stoperDziala = false;

function stopclock()
{
    if(stoperDziala)
    {
        clearTimeout(stoperID);
    }
    stoperDziala = false;
}

function startclock()
{
    stopclock();
    gettheDate()
    showtime();
}

function showtime()
{
    let teraz = new Date();
    let godziny = teraz.getHours();
    let minuty = teraz.getMinutes();
    let sekundy = teraz.getSeconds();
    let wartoscCzasu = "" + ((godziny > 12) ? godziny - 12 : godziny);
    wartoscCzasu += ((minuty < 10) ? ":0" : ":") + minuty
    wartoscCzasu += ((sekundy < 10) ? ":0" : ":") + sekundy
    wartoscCzasu += (godziny >= 12) ? "P.M." : "A.M."
    document.getElementById("clock").innerHTML = wartoscCzasu;
    stoperID = setTimeout("showtime()", 1000);
    stoperDziala = true;
}