<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/navBar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>


<div class="navigation" id="navBar">
    <a href="/student/home"> <i class="fas fa-home" id="homeIcon"></i>Home</a>

    <div class="profileDropdown">
        <button class="dropDownButton"><i class="fas fa-user-graduate" id="userIcon"></i><?php echo Auth::user()->firstName?>
            <i class="fa fa-caret-down" id="dropdwn"></i>
        </button>
        <div class="dropdownLinks">
            <a href="/student/profile"><i class="fas fa-user-graduate" id="userIcon"></i>Profile</a>
            <a href="/student/results"><i class="fas fa-poll" id="userIcon"></i>Results</a>
            <a href="/student/logout"> <i class="fas fa-sign-out-alt" id="userIcon"></i>Logout</a>
        </div>
    </div>
    <a href="/student/search"><i class="fas fa-check" id="userIcon"></i>Your Quizzes</a>
    <a href="javascript:void(0);" class="burger" onclick="burgerNav()">&#9776;</a>
</div>

<div class="header">
    <h2 id="center">Contact Us</h2>
    <p id="techInfo">For technical support, bug reports and recommendations, please contact us here using the form below:</p>
</div>

<div class ="contactContainer">
    <form action="/contact.php">

        <label class="contactCaptions">Full Name</label>
        <input type="text" id="fullName" name="fullName" placeholder="Your Name">

        <label class="contactCaptions">Email</label>
        <input type="text" id="contactEmail" name="email" placeholder="Your Email">

        <label class="contactCaptions">Subject</label>
        <select id="subjectEmail" name="subjectEmail">
            <option value ="bug report">Bug Report</option>
            <option value ="Feedback">Feedback</option>
            <option value ="Account Help">Account Help</option>
            <option value ="Legal">Legal</option>
            <option value ="Other">Other</option>
        </select>

        <label class="contactCaptions"> Message</label>
        <textarea id="contactMessage" name="message" placeholder="Your Message"></textarea>
        <div class="buttonWrapper">
            <div class="createQuizButtons">
                <button class="buttons loginButton"  type="submit" value="Submit"><span>Submit</span><i class="fa fa-envelope"></i></button>
            </div>
        </div>
    </form>
</div>

</body>
</html>