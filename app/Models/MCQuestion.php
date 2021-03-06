<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MCQuestion extends Model
{
    public static function addQuestionMC($mcQuestion, $correctAns, $altAns1, $altAns2, $altAns3, $quizID)
    {

        DB::insert('insert into mcquestion(mcQuestion, correctAns, altAns1, altAns2, altAns3, quizID) values (:mcQuestion, :correctAns, :altAns1, :altAns2, :altAns3, :quizID)',

            [':mcQuestion' => $mcQuestion, ':correctAns' => $correctAns, ':altAns1' => $altAns1, ':altAns2' => $altAns2, ':altAns3' => $altAns3, ':quizID' => $quizID]);


    }

    public static function countQuestions($quizID){

        $questionCount = DB::select('select count(mcQuestion) from MCQuestion where (quizID = :quizID)',['quizID' => $quizID]);

        return $questionCount;
    }

    public static function compareAnswerMC($mcID, $inputAnswer){

       $results = DB::select('SELECT EXISTS (SELECT * FROM MCQuestion WHERE ( mcID = :mcID AND correctAns = :inputAnswer)) AS correct',
            ['mcID' => $mcID, 'inputAnswer' => $inputAnswer]);

       return $results;
    }


}