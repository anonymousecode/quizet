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
                <div class="card-header bg-primary text-white">
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

                    <form method="POST" action="{{ route('submit',$id)}}">
                        @csrf
                        @foreach ($options as $option)
                            <label>
                                <input type="radio" name="answer" value="{{ $option }}" required
                                    @if (isset($answers[$id]) && $answers[$id] === $option) checked @endif
                                >
                                {!! html_entity_decode($option) !!}
                            </label><br>
                        @endforeach

                        <button class="btn btn-success">Submit Answer</button>
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