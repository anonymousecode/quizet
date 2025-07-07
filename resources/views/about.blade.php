<!DOCTYPE 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizet</title>
</head>
<body>
    <x-layout>
        <x-slot name="content">
        <div class="container my-5 ">
            <h1>About Quizet</h1>
            <p>Quizet is an interactive platform designed to make learning fun and engaging. Take quizzes across various categories, test your knowledge, and track your progress.</p>

            <h3>Features</h3>
            <ul>
                <li>Quick, fun quizzes</li>
                <li>Wide range of topics</li>
                <li>Instant score feedback</li>
                <li>Multiple choice format</li>
            </ul>

            <h3>Contact</h3>
            <p>Have feedback or questions? Reach us at <a href="mailto:anonymousecode1@gmail.com">email</a>.</p>

            <div class="text-center">
                <a href="https://github.com/anonymousecode">
                    <img src="{{asset('/images/github.png')}}" class="img-fluid" alt="GitHub Logo" style="max-width: 100px; margin-top: 20px;">
                </a>
            </div>
        </div>
        </x-slot>
    </x-layout>

</body>
</html>