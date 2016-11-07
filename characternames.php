<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$style = $path . "/styles/header.php";
$media = $path . "/styles/media.php";
$buttons = $path . "/styles/buttons.php";
$category = "people";
$page = "characternames";
require_once($style);
require_once($media);
?>

<h1>Character Name Generator</h1>
<ol class="breadcrumb">
    <li><a href="http://www.mossystones.net">Home</a></li>
    <li><a href="names.php">Names</a></li>
    <li class="active">Character Name Generator</li>
    <li><?php require_once($buttons) ?></li>
</ol>
<ul>
    <li><b>Hover</b> over the name for information on naming customs.
    <li><b>Select</b> any or all criteria you want to generate.
    <li><b>Click</b> the link in [brackets] on the right for more info on naming customs.
</ul>

<script>
    var counter = 0;

    function checkMe()
    {
        var pickMe = "src/gen";

        pickMe += ethnicity();
        pickMe += gender();
        generate(pickMe);
    }
    ;
    function gender()
    {
        var male = document.getElementById("male");
        var female = document.getElementById("female");
        if (male.checked === true)
        {
            if (female.checked === false) // Male, no female.
            {
                return "Male";
            }
            else // Male and female.
            {
                var rand = Math.floor((Math.random() * 2) + 1);

                if (rand == 1)
                {
                    return "Male";
                }
                else
                {
                    return "Female";
                }
            }
        }
        else if (female.checked === true) // Female, no male.
        {
            return "Female";
        }
        else // Neither
        {
            document.getElementById("gender").innerHTML = "(Please select a gender, either or both.)";
        }
    }
    function ethnicity()
    {
        var english = document.getElementById("english");
        var spanish = document.getElementById("spanish");
        var japanese = document.getElementById("japanese");
        var total = [];

        if (english.selected === true)
        {
            total.push("English");
        }

        if (spanish.selected === true)
        {
            total.push("Spanish");
        }

        if (japanese.selected === true)
        {
            total.push("Japanese");
        }

        if (total.length === 0)
        {
            document.getElementById("ethnicity").innerHTML = "(Please select an ethnicity, any or all.)";
        }

        var rand = total[Math.floor(Math.random() * total.length)];


        if (rand === "English")
        {
            return "English";
        }
        else if (rand === "Spanish")
        {
            return "Spanish";
        }
        else if (rand === "Japanese")
        {
            return "Japanese";
        }
    }
    function generate(pickMe) {
        pickMe += ".php";

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                list = xhttp.responseText;
                document.getElementById("gen").innerHTML = list += document.getElementById("gen").innerHTML;
                document.getElementById("gender").innerHTML = "";
                document.getElementById("ethnicity").innerHTML = "";
                counter = counter + 1;
                document.getElementById("counter").innerHTML = counter + " names generated";
            }
        };

        xhttp.open("POST", pickMe, true);
        xhttp.send();
    }
    function clearMe() {
        document.getElementById("gen").innerHTML = "";
        counter = 0;
        document.getElementById("counter").innerHTML = "";
        document.getElementById("gender").innerHTML = "";
        document.getElementById("ethnicity").innerHTML = "";

    }
</script>
<div id="wrapped">
    <p style="text-align: center">Select multiple with <b>Ctrl+Click</b>.</p>
    <select multiple class="form-control">
        <option id="english">English</option>
        <option id="spanish">Spanish</option>
        <option id="japanese">Japanese</option>
    </select>

    <div id="checks">
    <input type="checkbox" id="male" checked>Male</input>
    <input type="checkbox" id="female" checked>Female</input> <i class="plz" id="gender"></i>
    </div>

    <button onclick="checkMe()">Generate</button>
    <button onclick="clearMe()">Clear the Board</button> <i id="counter"></i>
    <div id="gen" class="panel panel-default">
    </div>
</div>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/styles/footer.php";
require_once($path);
?>