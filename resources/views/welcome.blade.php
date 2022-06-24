<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-200 p-4">
<div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
    <h1 class="font-bold text-5xl text-center mb-8">Laravel + Tailwind</h1>
    <div class="mb-6">
        <form action="/" method="post" class="flex flex-col space-y-4">
            @csrf

            <input type="text" name="title" placeholder="The todo title" class="py-3 px-4 bg-gray-100 rounded-xl">

            <textarea name="description" placeholder="The todo description"
                      class="py-3 px-4 bg-gray-100 rounded-xl"></textarea>

            <button class="w-28 py-4 px-8 bg-green-500 text-white rounded-xl">Add</button>
        </form>
    </div>
    <hr>
    <div class="mt-2">
        @foreach($todos as $todo)
            <div @class(["py-4 flex items-center border-b border-gray-300 px-3", $todo->isDone ? "bg-green-200" : ""])>
                <div class="flex-1 pr-8">
                    <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                    <p class="text-gray-500">{{ $todo->description }}</p>
                </div>

                <div class="flex space-x-3">
                    @if(!$todo->isDone)
                        <form method="post" action="/{{ $todo->id }}">
                            @csrf
                            @method('PATCH')
                            <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </button>
                        </form>
                    @endif

                    <form method="post" action="/{{ $todo->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
