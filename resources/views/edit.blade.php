<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>edit list item</title>
</head>
<body class="bg-gray-200 p-4">
<div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
    
<form class="flex flex-col space-y-4" action="{{ route('todos.update.update', $todo->id) }}" method="POST">
    @csrf
    @method('PATCH')

{{-- *** EDIT title *** --}}
        <label for="title">Title:</label>
        <input class="py-3 px-4 bg-gray-100 rounded-xl" type="text" name="title" value="{{ $todo->title }}">


{{-- *** EDIT Description *** --}}
        <label class="align-top" for="description">Description:</label>
        <textarea class="py-3 px-4 bg-gray-100 rounded-xl" name="description">{{ $todo->description }}</textarea>

{{-- *** EDIT Due Date *** --}}
        <label for="due_date">Due Date:</label>
        <input class="py-3 px-4 bg-gray-100 rounded-xl" type="date" name="due_date" value="{{ $todo->due_date }}" required>



    <button class="w-28 py-4 px-8 bg-blue-500 text-white rounded-xl" type="submit">Update</button>
</form>
</div>

</body>
</html>