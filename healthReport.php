
<!DOCTYPE html>
    <html>
        <head>
        <title>Simple Form</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <div class="container">
                <h1>Health Reports</h1>
                <form id="getReport" enctype="multipart/form-data" method="GET" action="healthReportCrud.php">
                <input type="email" name="email" placeholder="Email ID" required>
                <button type="submit">Get Report</button>
                </form>
            </div>
        </body>
    </html>