<!DOCTYPE html>
<html>
<head>
    <title>PHP Enhancements</title>
</head>
<body>
    <h1>PHP Enhancements</h1>
    
    <h2>Enhancement 1: Store quiz questions in database</h2>
    <p>This enhancement involves storing the quiz questions in a database table and dynamically generating the quiz form using PHP.</p>
    <p>Implementation steps:
        <ol>
            <li>Create a `questions` table in the database to store quiz questions and correct answers.</li>
            <li>Modify the `quiz.php` to fetch questions from the database and display them in the form.</li>
            <li>Modify `markquiz.php` to fetch correct answers from the database and calculate the score.</li>
        </ol>
    </p>
    
    <h2>Enhancement 2: User authentication for supervisor</h2>
    <p>This enhancement adds a login system for the quiz supervisor, restricting access to the management page.</p>
    <p>Implementation steps:
        <ol>
            <li>Create a `users` table in the database to store supervisor usernames and passwords.</li>
            <li>Create a login form and a PHP script to authenticate the user.</li>
            <li>Protect `manage.php` by checking for an authenticated session.</li>
        </ol>
    </p>
    
</body>
</html>
