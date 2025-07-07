<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizet</title>
</head>
<body>

    <x-layout>
    <x-slot name="content">
    <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <!-- Quiz Card -->
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Question {{$id+1}} </h4>
                </div>
                
                <div class="card-body">
                    <h5 class="card-title">{!! html_entity_decode($question['question']) !!}</h5>

                    @php
                        // Prepare options: correct answer + incorrect answers, then shuffle
                        $options = $question['incorrect_answers'];
                        $options[] = $question['correct_answer'];
                        shuffle($options);
                    @endphp

                    <form method="POST" action="{{ route('submit', $id) }}">
    @csrf
    @foreach ($options as $option)
        <div class="form-check mb-2">
            <input 
                class="form-check-input" 
                type="radio" 
                name="answer" 
                id="option-{{ $loop->index }}" 
                value="{{ $option }}" 
                required
                @if (isset($answers[$id]) && $answers[$id] === $option) checked @endif
            >
            <label class="form-check-label" for="option-{{ $loop->index }}">
                {!! html_entity_decode($option) !!}
            </label>
        </div>
    @endforeach

    <button type="submit" class="btn btn-dark mt-3">Submit Answer</button>
</form>


                </div>
            </div>

        </div>
    </div>
    </div>

    </x-slot>   
    </x-layout>
    
</body>
</html>