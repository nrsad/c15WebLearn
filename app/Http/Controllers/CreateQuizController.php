<?php

namespace App\Http\Controllers;

use App\Models\InputQuestion;
use App\Models\JSQuestion;
use App\Models\MCQuestion;
use App\Models\TeacherQuiz;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CreateQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        return view('createQuiz');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$mcCount = count(Input::get('mcQuestion'));
        //echo $mcCount;

        //return $request->all();

        //retrieve teacher ID from Session
        $teacherID = Session::get("id");
        //ignore module code for now

        //quiz ID
        $quizID = TeacherQuiz::findQuizID();

        $newID = $quizID["max(quizID)"] + 1;

        //return $quizIDString;
        //add quizTitle,quizstart,quizend,quizstatus,duration,module code,teacherID to teachquiz table

        $quizTitle = $request ['quizTitle'];
        $quizDateStart = $request ['quizDateStart'];
        $quizDateEnd = $request ['quizDateEnd'];
        $quizDuration = $request ['timer'];
        $moduleCode = $request ['moduleCode'];
        $quizStatus = "active";

        if($quizDateStart > time()){

            $quizStatus = "queued";
        };

        TeacherQuiz::addDetails($newID, $quizTitle, $quizDateStart, $quizDateEnd, $quizStatus, $quizDuration, $moduleCode, $teacherID);

        //return $quizTitle;
        //----Multiple Choice Questions----//
        //retrieve arrays of question inputs, and set a count for the amount

        if(Input::get('mcQuestion') != null) {
            $mcCount = count(Input::get('mcQuestion'));

            $mcQuestion = Input::get('mcQuestion');
            $mcCorrectAns = Input::get('mcCorrectAnswer');
            $mcIncorrectAnswer1 = Input::get('mcIncorrectAnswer1');
            $mcIncorrectAnswer2 = Input::get('mcIncorrectAnswer2');
            $mcIncorrectAnswer3 = Input::get('mcIncorrectAnswer3');

            for ($i = 0; $i < $mcCount; $i++) {

                MCQuestion::addQuestionMC($mcQuestion[$i], $mcCorrectAns[$i], $mcIncorrectAnswer1[$i], $mcIncorrectAnswer2[$i], $mcIncorrectAnswer3[$i], $newID);

            }
        }

        //----Input Questions----//
        if(Input::get('inputQuestion') != null) {
            $inputCount = count(Input::get('inputQuestion'));
            $inputQuestion = Input::get('inputQuestion');
            $inputAnswer = Input::get('inputAnswer');

            for ($i = 0; $i < $inputCount; $i++) {

                InputQuestion::addQuestionInput($inputQuestion[$i], $inputAnswer[$i], $newID);

            }
        }
        if(Input::get('jsQuestion') != null) {
            $jsCount = count(Input::get('jsQuestion'));
            $jsQuestion = Input::get('jsQuestion');
            $jsInput = Input::get('jsInput');
            $jsOutput = Input::get('jsOutput');
            $jsType = Input::get('jsOutput');

            for ($i = 0; $i < $jsCount; $i++) {

                JSQuestion::addQuestionJS($jsQuestion[$i], $jsInput[$i], $jsOutput[$i], $jsType[$i], $newID);
            }
        }

        return redirect('teacher/home')->with('created', 'Quiz created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
