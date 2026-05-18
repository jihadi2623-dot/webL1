<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Student Operations</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f9; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .section { margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
        h2 { color: #333; }
        .result { color: #007BFF; font-weight: bold; }
        ul { list-style-type: square; }
        input[type="text"], input[type="submit"] { padding: 8px; margin-top: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Student Marks & Details System</h1>

    <!-- Form to take input using Superglobal ($_POST) -->
    <form method="post" action="">
        <label for="studentName"><strong>Enter Student Name:</strong></label><br>
        <input type="text" id="studentName" name="studentName" placeholder="e.g. John Doe" required>
        <input type="submit" value="Process Data">
    </form>

    <hr>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // 1. Using Superglobal Variable to take input
        $name = isset($_POST['studentName']) ? $_POST['studentName'] : "Guest";

        echo "<h2>Analysis for: " . htmlspecialchars($name) . "</h2>";

        // ---------------------------------------------------------
        // 2. Indexed Array of at least 5 marks
        // ---------------------------------------------------------
        $marks = [85, 42, 67, 91, 55];

        echo "<div class='section'>";
        echo "<h3>1. Student Marks (Indexed Array)</h3>";
        echo "<ul>";
        
        // Display using foreach loop
        foreach ($marks as $mark) {
            echo "<li>" . $mark . "</li>";
        }
        echo "</ul>";
        echo "</div>";

        // ---------------------------------------------------------
        // 3. Calculations: Total, Average, Max, Min, Pass/Fail
        // ---------------------------------------------------------
        echo "<div class='section'>";
        echo "<h3>2. Statistical Analysis</h3>";
        
        $total = 0;
        $maxMark = $marks[0]; // Initialize with first element
        $minMark = $marks[0]; // Initialize with first element
        $passCount = 0;
        $failCount = 0;

        // Loop to calculate stats using control flow
        foreach ($marks as $mark) {
            $total += $mark;

            // Control flow for Max
            if ($mark > $maxMark) {
                $maxMark = $mark;
            }

            // Control flow for Min
            if ($mark < $minMark) {
                $minMark = $mark;
            }

            // If-else condition for Pass/Fail
            if ($mark >= 50) {
                $passCount++;
            } else {
                $failCount++;
            }
        }

        // Built-in Array Function: count()
        $numberOfSubjects = count($marks);

        // User-Defined Function Definition
        function calculateAverage($total, $count) {
            return $total / $count;
        }

        // Calling User-Defined Function
        $average = calculateAverage($total, $numberOfSubjects);

        // Demonstration of Type Casting (converting result to float explicitly)
        $formattedAvg = (float)$average;

        echo "Total Marks: <span class='result'>$total</span><br>";
        echo "Average Marks: <span class='result'>$formattedAvg</span> (Type Casted to Float)<br>";
        echo "Maximum Mark: <span class='result'>$maxMark</span><br>";
        echo "Minimum Mark: <span class='result'>$minMark</span><br>";
        echo "Passed (>=50): <span class='result'>$passCount</span><br>";
        echo "Failed (<50): <span class='result'>$failCount</span><br>";
        echo "</div>";

        // ---------------------------------------------------------
        // 4. Associative Array (Student Details)
        // ---------------------------------------------------------
        echo "<div class='section'>";
        echo "<h3>3. Student Details (Associative Array)</h3>";
        
        $studentDetails = [
            "name" => $name,
            "id" => "STD-2023-88",
            "cgpa" => 3.75
        ];

        // Printing key-value pairs using a loop
        foreach ($studentDetails as $key => $value) {
            // ucfirst() capitalizes the first letter of the key for display
            echo "<strong>" . ucfirst($key) . ":</strong> " . $value . "<br>";
        }
        echo "</div>";

        // ---------------------------------------------------------
        // 5. String Operations
        // ---------------------------------------------------------
        echo "<div class='section'>";
        echo "<h3>4. String Operations on Name</h3>";
        echo "Original Name: " . $name . "<br>";
        
        // Operation 1: Convert to Uppercase
        $upperName = strtoupper($name);
        echo "Uppercase: " . $upperName . "<br>";
        
        // Operation 2: Find String Length
        $nameLength = strlen($name);
        echo "Name Length: " . $nameLength . " characters<br>";
        echo "</div>";

    } else {
        echo "<p>Please enter a name and click 'Process Data' to see the results.</p>";
    }
    ?>
</div>

</body>
</html>