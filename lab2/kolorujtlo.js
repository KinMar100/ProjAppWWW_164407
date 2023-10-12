var computed = false;
var decimal = 0;
function convert(entrform, from, to)
{
    let convfrom = from.selectedIndex;
    let convto = to.selectedIndex;
    entrform.display.value = (entrform.input.value * from[convfrom].value / to[convto].value);
}

function addChar (input, char)
{
    if((char === "." && decimal === "0") || char!==".")
    {
        (input.value === "" || input.value === "0")
            ? input.value = char
            : input.value += char
        convert(input.form.input.form.measure, input.form.measure2)
        computed = true;
        if(char === ".")
        {
            decimal = 1;
        }
    }
}
function openVothcom()
{
    window.open("","Display window","toolbar=no, directories=no, menubar=no");
}

function clear (form)
{
    form.input.value = 0;
    form.display.value = 0;
    decimal = 0;
}

function changeBackground(hexNumber)
{
    document.bgColor = hexNumber;
    if (document.bgColor === '#000000') {
        document.getElementById("zmiana").style.color = "white";
    }
    else
    {
        document.getElementById("zmiana").style.color = "black";
    }
}