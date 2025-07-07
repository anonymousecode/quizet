<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller
{
    function getQuiz(){

        $questions = Http::get('https://opentdb.com/api.php?amount=10&category=9&type=multiple');
        session(['questions' => $questions->json()['results']]);
        session(['score' => 0]);

        return redirect('quiz/0');
    }

    function showQuiz($id){

        $questions = session('questions',[]);
        $answers = session('answers', []);


       if ($id >= count($questions) || $id < 0 || !$questions || !isset($questions[$id])) {
        logger("Invalid access detected, redirecting to result");
        return redirect('/quiz/result');
    }

        $question = $questions[$id];
        return view('quiz', [
            'question' => $question,
            'answers' => $answers,
            'id' => $id,    
            'total' => count($questions)
        ]);
    }

    function submitAnswer(Request $request, $id){

        $questions = session('questions', []);
        $question = $questions[$id];
        $score = session('score',0);
        if ($request->answer === $question['correct_answer']) {
            $score++;
        }
        session(['score' => $score]);

        $id = $id + 1;
        $questionCount = count(session('questions', []));
        logger("Submit: Next ID = $id, Total = $questionCount");

        if ($id >= $questionCount) {
            logger("Redirecting to result");
            return redirect('/quiz/result'); 
        } else {
            logger("Redirecting to quiz/$id");
            return redirect("quiz/{$id}");
        }


    }

    function result(){

        $score = session('score');
        $questions = session('questions', []);

        return view('result', [
            'score' => $score,
            'total' => count($questions)
        ]);
}

}
