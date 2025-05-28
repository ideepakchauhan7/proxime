<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Revenue Predictor</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "./css/revenue_predictor.css">
</head>
<body>

    <div id="ai-embed">
        <h3>📊 Revenue Forecast</h3>
        <p>Loading predictions...</p>
    </div>

    <div class="summary-box">
    <h4>📌 Quick Summary</h4>
        <ul>
            <li>🔍 This tool shows the <strong>predicted monthly revenue</strong> for the year 2025.</li>
            <li>📈 Predictions are based on past trends and machine learning algorithms.</li>
            <li>💰 The <strong>total forecasted revenue</strong> for 2025 is <span id="total-amount">Loading...</span>.</li>
            <li>📊 You can expect an <strong>average monthly revenue</strong> of <span id="avg-amount">Loading...</span>.</li>
            <li>🌟 The <strong>highest revenue</strong> is expected in <span id="best-month">Loading...</span>.</li>
        </ul>
        <button class ="download-button " onclick="downloadPDF()">
        📥 Download Report as PDF
        </button>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    async function getPredictedRevenue() {
        try {
            const response = await fetch('http://127.0.0.1:5000/predict_revenue');
            const data = await response.json();

            if (data.status === "success") {
                const predictions = data.yearly_prediction;

                const orderedMonths = [
                    "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                ];

                const sortedEntries = Object.entries(predictions).sort((a, b) => {
                    const [monthA, yearA] = a[0].split(" ");
                    const [monthB, yearB] = b[0].split(" ");
                    if (yearA !== yearB) {
                        return parseInt(yearA) - parseInt(yearB);
                    }
                    return orderedMonths.indexOf(monthA) - orderedMonths.indexOf(monthB);
                });

                let outputHTML = "<h3>📊 Revenue Forecast</h3><ul>";
                let total = 0;
                let maxValue = 0;
                let bestMonth = "";

                sortedEntries.forEach(([month, value]) => {
                    total += value;
                    if (value > maxValue) {
                        maxValue = value;
                        bestMonth = month;
                    }

                    outputHTML += `<li><strong>${month}</strong> <span class="amount">₹${value.toFixed(2)}</span></li>`;
                });
                outputHTML += "</ul>";

                const average = total / sortedEntries.length;

                // Append Total and Average at bottom of revenue block
                outputHTML += `<p><strong>Total (1 Year):</strong> <span class="amount">₹${total.toFixed(2)}</span></p>`;
                outputHTML += `<p><strong>Average / Month:</strong> <span class="amount">₹${average.toFixed(2)}</span></p>`;

                // Inject forecast block
                document.getElementById("ai-embed").innerHTML = outputHTML;

                // Update summary box
                document.getElementById("total-amount").innerText = `₹${total.toFixed(2)}`;
                document.getElementById("avg-amount").innerText = `₹${average.toFixed(2)}`;
                document.getElementById("best-month").innerText = `${bestMonth} (₹${maxValue.toFixed(2)})`;

                

            } else {
                document.getElementById("ai-embed").innerHTML = `<p>Error: ${data.message}</p>`;
            }
        } catch (error) {
            document.getElementById("ai-embed").innerHTML = "<p>❌ Failed to fetch predictions.</p>";
            console.error("Error:", error);
        }
    }

    window.onload = getPredictedRevenue;
</script>

<script>
    async function downloadPDF() {
        const element = document.body; 
        const canvas = await html2canvas(element, { scale: 2 });
        const imgData = canvas.toDataURL("image/png");

        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF("p", "mm", "a4");

        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        pdf.addImage(imgData, "PNG", 0, 0, pdfWidth, pdfHeight);
        pdf.save("Revenue_Report_2025.pdf");
    }
</script>



</body>
</html>
