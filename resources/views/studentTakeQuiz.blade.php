<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Take Quiz</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/studentTakeQuiz.js"></script>
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
        <button class="dropDownButton"><i class="fas fa-user-tie" id="userIcon"></i> <?php echo Auth::user()->firstName?>
            <i class="fa fa-caret-down" id="dropdwn"></i>
        </button>
        <div class="dropdownLinksTeacher">
            <a href="/student/profile"><i class="fas fa-user-tie" id="userIcon"></i>Profile</a>
            <a href="/student/results"><i class="fas fa-poll" id="userIcon"></i>Results</a>

            <a href="/student/logout"> <i class="fas fa-sign-out-alt" id="userIcon"></i>Logout</a>
        </div>
    </div>
    <a href="/student/search"><i class="fas fa-check" id="userIcon"></i>Your Quizzes</a>
    <a href="/contact"> <i class="fas fa-envelope" id="userIcon"></i>Contact Us</a>
    <a href="javascript:void(0);" class="burger" onclick="burgerNav()">&#9776;</a>
</div>

<h2 id="quizHeader">{{$quizTitle}}</h2>
<p id = "timer">{{$duration/60}}</p>

<form id ="takeQuizForm">

    <input id="quizID" type="hidden" name="quizID" value="{{$quizID}}">

    <?php $i = 0;
          $q = 0;?>

    @foreach($mQuestions as $mQuestion)


        <br>
        <br>

        <div class = "takeQuestionContainer">
            <br>
                 <fieldset class="radiogroup" >

                     <legend id="questionText">{{$mQuestion[0]}}</legend>
                <label ><input type="radio" id ="radioSpace" name={{$i}} class="mcOption" value='{ "mcID" : "{{$mQuestion[1]}}" ,"text" : "{{$mQuestion[2]}}" }' >{{$mQuestion[2]}}</label> <br>
                <label ><input type="radio" id ="radioSpace" name={{$i}} class="mcOption" value='{ "mcID" : "{{$mQuestion[1]}}" ,"text" : "{{$mQuestion[3]}}" }' >{{$mQuestion[3]}}</label> <br>
                <label ><input type="radio" id ="radioSpace" name={{$i}} class="mcOption" value='{ "mcID" : "{{$mQuestion[1]}}" ,"text" : "{{$mQuestion[4]}}" }' >{{$mQuestion[4]}}</label> <br>
                <label ><input type="radio" id ="radioSpace" name={{$i}} class="mcOption" value='{ "mcID" : "{{$mQuestion[1]}}" ,"text" : "{{$mQuestion[5]}}" }' >{{$mQuestion[5]}}</label> <br>

                 </fieldset>
            <div id={{$q}}></div>
        </div>

        <?php $i++;
              $q++;?>

    @endforeach

    @foreach($jQuestions as $jQuestion)

        <br>
        <br>

        <div class = "takeQuestionContainer">
            <div class = "jsQuestionContainer">
                <p class="questionText">{{$jQuestion->jsQuestion}}</p>
                <input type="hidden" name={{$i}} class="javascriptQuestionIDs" value="{{$jQuestion->jsID}}">

                <?php $i++ ?>
                <input type="hidden" name={{$i}} class="javascriptAnswer" value="" id="studentAnswer">

                <textarea id="jsQuestion" size="50" form="takeQuizForm" placeholder="Write your javascript function here..."></textarea> <br> <div id={{$q}}></div>
            </div>
        </div>

        <?php $i++;
        $q++;?>
    @endforeach

    @foreach( $iQuestions as $iQuestion)

        <br>
        <br>

        <div class = "takeQuestionContainer">

            <p class="questionText">{{$iQuestion->inputQuestion}}</p>
            <input type="hidden" name={{$i}} class="inputQuestionIDs" value={{$iQuestion->inputQuestionID}}>

            <?php $i++ ?>

            <input type="text" class="inputQuestion" name={{$i}}><br>  <div id={{$q}}></div> </div>

        <?php $i++;
                $q++;?>

    @endforeach



        <br>
        <br>

        <div class="QuizStyle">
            <input type="button" id="quizSubmit" value="Submit Quiz Now">
        </div>

    <br>
</form>

<span id="grade"></span>

</body>
</html>
