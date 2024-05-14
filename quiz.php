<?php include 'header.inc'; ?>
<?php include 'menu.inc'; ?>

<main>
    <h2>Quiz</h2>
    <form action="markquiz.php" method="post" novalidate>
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" maxlength="30" required>
        <br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" maxlength="30" required>
        <br>
        <label for="studentid">Student ID:</label>
        <input type="text" id="studentid" name="studentid" pattern="\d{7}|\d{10}" required>
        <br>
        <!-- Add quiz questions here -->
        <input type="submit" value="Submit Quiz">
    </form>
</main>

<?php include 'footer.inc'; ?>
