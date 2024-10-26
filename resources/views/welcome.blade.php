<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <!--<link rel="preconnect" href="https://fonts.bunny.net">-->
        <!--<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <style>
             body {
                font-family:'Nunito', sans-serif;
             }  
        </style>
    </head>
    <body class="bg-gray-200 p-4">
        <div class="lg:w-2/4 mxauto py-8 px-6 rounded-xl">
            <h1 class="font-bold text-5xl text-center mb-8">Todo App</h1>

            <div class="mb-6"></div>
                <form class="flex flex-col space-y-4" method="POST" action="/">
                    @csrf

                    <input type="text" name="title" placeholder="The todo title" class="py-3 px-4 bg-gray-100 rounded-xl">

                    <textarea name="desciption" placeholder="The todo description" class="py-3 px-4 bg-gray-100 rounded-xl"></textarea>

                    <button class="w-28 py-4 px-8 bg-green-500 text-white rounded-xl">Add</button>
                </form>
            </div>

            <hr>

        <div class="mt-2">
           
                    
            @foreach ($todoapps as $todoapp)
                <div @class([
                    'py-4 flex items-center border-b border-gray-300 px-3',
                    $todoapp->isDone ? 'bg-green-200' : ''
                    ])>
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">{{ $todoapp->title }}</h3>
                        <p class="text-gray-500">The description</p>
                    </div>

                    <div class="flex space-x-3">
                        <form method="POST" action="/{{ $todoapp->id }}">
                            @csrf 
                            @method('PATCH')
                        <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                              </svg>      
                        </button>
                        </form>

                        <form method="POST" action="/{{ $todoapp->id }}">
                            @csrf 
                            @method('DELETE')
                        <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                            </svg>                                        
                        </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
