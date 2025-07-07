<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::view('/','welcome');
Route::view('/about','about');

Route::get('/category',[QuizController::class,'start'])->name('category');

Route::get('/quiz/result',[QuizController::class,'result'])->name('result');
Route::get('/quiz/start/{key}',[QuizController::class,'getQuiz'])->name('quiz');

Route::get('/quiz/{id}',[QuizController::class,'showQuiz'])->name('show');

Route::post('/quiz/{id}/submit',[QuizController::class,'submitAnswer'])->name('submit');