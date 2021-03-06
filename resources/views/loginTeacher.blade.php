<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

<div class="login">
    <div class="logo">
        <img src="/images/GradiQuiz_Logo.png" alt="logo" />
    </div>

    <div class="loginContainer">
        <form method="POST" action="/teacher/login">
            @csrf
            <label for="email">
                <input type ="email" name="email" placeholder = "Enter your University email address" size="35" id="email" name="email" required>
            </label>
            <br>
            <label for="password">
                <input type ="password" placeholder = "Please enter your password" id="password" name="password" size="35" required>
            </label>
            <br>
            <button class="loginButton" type="submit" value="Submit">Log me in!</button>
        </form>

        <br><br>
        <a id="registerLink" href="/reg">Don't have an account? Click here</a>
    </div>
</div>

</body>
</html>

