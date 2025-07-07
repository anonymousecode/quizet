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
                <h1>Categories</h1>
                <p>Select a category to start a quiz:</p>

                <div class="row">
                    @foreach ($categories as $key => $category)
                        <div class="col-md-4 mb-4 d-flex justify-content-center">
                            <a href="{{route('quiz',$key)}}" class="btn btn-dark btn-lg w-100">
                                {{ $category }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-slot>
    </x-layout>

</body>
</html>