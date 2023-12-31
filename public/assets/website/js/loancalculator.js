function calculate() {
    var amount = document.getElementById("amount");
    var apr = document.getElementById("apr");
    var years = document.getElementById("years");
    var zipcode = document.getElementById("zipcode");
    var payment = document.getElementById("payment");
    var total = document.getElementById("total");
    var totalinterest = document.getElementById("totalinterest");

    var principal = parseFloat(amount.value);
    var interest = parseFloat(apr.value) / 100 / 12;
    var payments = parseFloat(years.value) * 12;

    var x = Math.pow(1 + interest, payments);
    var monthly = (principal * x * interest) / (x - 1);

    if (isFinite(monthly)) {
        payment.innerHTML = monthly.toFixed(2);
        total.innerHTML = (monthly * payments).toFixed(2);
        totalinterest.innerHTML = ((monthly * payments) - principal).toFixed(2);

        save(amount.value, apr.value, years.value, zipcode.value);
        try {
            getLenders(amount.value, apr.value, years.value, zipcode.value);
        } catch (e) {
        }
        chart(principal, interest, monthly, payments);
    } else {
        payment.innerHTML = "";
        total.innerHTML = ""
        totalinterest.innerHTML = "";
        chart();
    }
}

function save(amount, apr, years, zipcode) {
    if (window.localStorage) {
        localStorage.loan_amount = amount;
        localStorage.loan_apr = apr;
        localStorage.loan_years = years;
        localStorage.loan_zipcode = zipcode;
    }
}

function getLenders(amount, apr, years, zipcode) {
    if (!window.XMLHttpRequest) return;
    var ad = document.getElementById("lenders");
    if (!ad) return;

    var url = "getLenders.php" +
        "?amt=" + encodeURIComponent(amount) +
        "&apr=" + encodeURIComponent(apr) +
        "&yrs=" + encodeURIComponent(years) +
        "&zip=" + encodeURIComponent(zipcode);
    var req = new XMLHttpRequest();
    req.open("GET", url);
    req.send(null);
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var response = req.responseText;
            var lenders = JSON.parse(response);
            var list = "";
            for (var i = 0; i < lenders.length; i++) {
                list += "<li><a href='" + lenders[i].url + "'>" +
                    lenders[i].name + "</a>";
            }
            ad.innerHTML = "<ul>" + list + "</ul>";
        }
    }
}


function chart(principal, interest, monthly, payments) {
    var graph = document.getElementById("graph");
    graph.width = graph.width;
    if (arguments.length == 0 || !graph.getContext) return
    var g = graph.getContext("2d");
    var width = graph.width,
        height = graph.height;
    function paymentToX(n) {
        return n * width / payments;
    }

    function amountToY(a) {
        return height - (a * height / (monthly * payments * 1.05));
    }
    g.moveTo(paymentToX(0), amountToY(0)); // Start at lower left
    g.lineTo(paymentToX(payments), // Draw to upper right
        amountToY(monthly * payments));

    g.lineTo(paymentToX(payments), amountToY(0)); // Down to lower right
    g.closePath(); // And back to start
    g.fillStyle = "#f88"; // Light red
    g.fill(); // Fill the triangle
    g.font = "bold 12px sans-serif"; // Define a font
    g.fillText("Total Interest Payments", 20, 20); // Draw text in legend
    // Cumulative equity is non-linear and trickier to chart
    var equity = 0;
    g.beginPath(); // Begin a new shape
    g.moveTo(paymentToX(0), amountToY(0)); // starting at lower-left
    for (var p = 1; p <= payments; p++) {
        // For each payment, figure out how much is interest
        var thisMonthsInterest = (principal - equity) * interest;
        equity += (monthly - thisMonthsInterest); // The rest goes to equity
        g.lineTo(paymentToX(p), amountToY(equity)); // Line to this point
    }
    g.lineTo(paymentToX(payments), amountToY(0)); // Line back to X axis
    g.closePath(); // And back to start point
    g.fillStyle = "green"; // Now use green paint
    g.fill(); // And fill area under curve
    g.fillText("Total Equity", 20, 35); // Label it in green
    // Loop again, as above, but chart loan balance as a thick black line
    var bal = principal;
    g.beginPath();
    g.moveTo(paymentToX(0), amountToY(bal));
    for (var p = 1; p <= payments; p++) {
        var thisMonthsInterest = bal * interest;
        bal -= (monthly - thisMonthsInterest); // The rest goes to equity
        g.lineTo(paymentToX(p), amountToY(bal)); // Draw line to this point
    }
    g.lineWidth = 3; // Use a thick line
    g.stroke(); // Draw the balance curve
    g.fillStyle = "black"; // Switch to black text
    g.fillText("Loan Balance", 20, 50); // Legend entry
    // Now make yearly tick marks and year numbers on X axis
    g.textAlign = "center"; // Center text over ticks
    var y = amountToY(0); // Y coordinate of X axis
    for (var year = 1; year * 12 <= payments; year++) { // For each year
        var x = paymentToX(year * 12); // Compute tick position
        g.fillRect(x - 0.5, y - 3, 1, 3); // Draw the tick
        if (year == 1) g.fillText("Year", x, y - 5); // Label the axis
        if (year % 5 == 0 && year * 12 !== payments) // Number every 5 years
            g.fillText(String(year), x, y - 5);
    }
    // Mark payment amounts along the right edge
    g.textAlign = "right"; // Right-justify text
    g.textBaseline = "middle"; // Center it vertically
    var ticks = [monthly * payments, principal]; // The two points we'll mark
    var rightEdge = paymentToX(payments); // X coordinate of Y axis
    for (var i = 0; i < ticks.length; i++) { // For each of the 2 points
        var y = amountToY(ticks[i]); // Compute Y position of tick

        g.fillRect(rightEdge - 3, y - 0.5, 3, 1); // Draw the tick mark
        g.fillText(String(ticks[i].toFixed(0)), // And label it.
            rightEdge - 5, y);
    }
}
