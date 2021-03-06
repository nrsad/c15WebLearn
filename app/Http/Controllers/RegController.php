<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //returns the registration view
        return view('registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //static teacher key
        $correctKey = '123';

        //assigns variables from the input
        $key = $request ['teacherKey'];
        $userType = $request['userType'];
        $firstName = $request['firstName'];
        $lastName = $request['lastName'];
        $Email = $request['email'];
        $password = $request['password'];
        $courseName = $request['courseName'];
        //detects which type of user is registering
        if($userType === "student") {
            //retrieves the courseID of course name that the student entered on registration
            $courseIDHolder = Course::getCourseID($courseName);
            //extracts data from retrieved result
            $extractCourseID = get_object_vars($courseIDHolder[0]);
            $courseID = $extractCourseID['courseID'];
            //adds the student's details to the Student table through query in Student model
            Student::register($firstName, $lastName, $Email, $password, $courseID);
            //redirects student to login page on successful registration
            return redirect('/login');
        }
        elseif ($userType === "teacher"){
            //checks to ensure teacherKey entered is correct
            if ($key === $correctKey) {
                //is correct, registers teacher through query in Teacher model
                Teacher::register($firstName, $lastName, $Email, $password);
                //redirects teacher to login page on successful registration
                return redirect('/login');
            }
            else{
                return "wrong key";
            }


        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        //0 = does not exist, 1 = does exist
        $exists = 0;
        $data = Student::checkExists($request);
        if(count($data) > 0){
            $exists = 1;
        }
        else{
            $exists = 0;
        }
        return response($exists);

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
