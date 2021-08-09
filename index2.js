/** LIKES */
// Callback function
function show(name) {
    // Get output container
    var result = document.getElementById("result");
    // Return callback function     //aqui se hace el bucle
    return function (answer) {
        // Valid answer
        if (pl.type.is_substitution(answer)) {
            // Get the value of the food
            var food = answer.lookup("X");
            // Get the person
            var person = name != "Y" ? name : answer.lookup("Y");
            // Show answer
            result.innerHTML = result.innerHTML + "<div>"+food + "</div>";
            document.getElementById("resultado").value = food
        }
    };
}

// Show the likes of a person
function likes(name) {
    // Create session
    var session = pl.create(1000);
    // Get program
    var program = document.getElementById("program").value; //string
    // Clear output
    document.getElementById("result").innerHTML = "";
    // Consult program
    session.consult(program);
    // Query goal
    session.query("sintomas(" + name + ", X).");
    // Find answers
    session.answers(show(name), 1000);
}

/** EVENTS */

// onClick #button
function clickButton() {
    var cadena = document.getElementById("preg1").value
                +document.getElementById("preg2").value
                +document.getElementById("preg3").value
                +document.getElementById("preg4").value
                +document.getElementById("preg5").value
                +document.getElementById("preg6").value
                +document.getElementById("preg7").value
                +document.getElementById("preg8").value
                +document.getElementById("preg9").value
                +document.getElementById("preg10").value
                +document.getElementById("preg11").value

    // Get person
    console.log(cadena);
    var name = cadena;
    name = name != "" ? name : "Y";
    // Get likes
    likes(name);
}