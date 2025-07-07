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
                
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0 text-center">Quiz Results</h4>
                    </div>
                    
                    <div class="card-body text-center">
                        <h5>Your Score:</h5>
                        <h2 class="display-4">{{ $score }} / {{ $total }}</h2>

                        <p class="mt-4">You answered <strong>{{ $score }}</strong> out of <strong>{{ $total }}</strong> questions correctly.</p>

                        <a href="/" class="btn btn-dark mt-3">Back to Home</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </x-slot>   
</x-layout>

</body>
</html>