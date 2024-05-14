<?php include 'header.inc'; ?>
<?php include 'menu.inc'; ?>

<main>
    <h2>Manage Quiz Attempts</h2>

    <?php
    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    // List all attempts
    $sql = "SELECT * FROM attempts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Date/Time</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Student ID</th>
                    <th>Attempt</th>
                    <th>Score</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"]. "</td>
                    <td>" . $row["datetime"]. "</td>
                    <td>" . $row["firstname"]. "</td>
                    <td>" . $row["lastname"]. "</td>
                    <td>" . $row["studentid"]. "</td>
                    <td>" . $row["attempt_num"]. "</td>
                    <td>" . $row["score"]. "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No attempts found";
    }

    // More queries...

    $conn->close();
    ?>
</main>

<?php include 'footer.inc'; ?>
