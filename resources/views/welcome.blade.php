<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>To Do App</title>
</head>
<body class="bg-gray-200 p-4">

    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
    
        <h1 class="font-bold text-5xl text-center mb-2" >To Do List</h1>
        <h4 class="font-thin text-center mb-8">Shall We Stop Procastinating?</h4>




{{-- *** Create a new task *** --}}
    <div class="mb-6">
            <form class="flex flex-col space-y-4" action="{{ route('todos.store') }}" method="POST">
                @csrf
                    <input class="py-3 px-4 bg-gray-100 rounded-xl" type="text" name="title" placeholder="Title" >
                    <textarea class="py-3 px-4 bg-gray-100 rounded-xl" name="description" placeholder="To Do Description" id="" cols="30" rows="10"></textarea>
                    <label class="px-1 pt-5" for="due_date">Due Date:</label>
                    <input class="py-3 px-4 bg-gray-100 rounded-xl" type="date" name="due_date" required>
                    <button class="w-28 py-4 px-8 bg-blue-500 text-white rounded-xl" >Add</button>
            </form>
</div>




<hr>




{{-- SORTING fiters --}}
    <div class="mb-4 py-4">
        <p>Filter List by:</p>
        <a href="{{ route('todos.sort', ['sort_by' => 'created_at', 'sort_order' => 'desc', 'filter' => 'all']) }}">All</a>
        <span class="mx-2">|</span>
        <a href="{{ route('todos.sort', ['sort_by' => 'created_at', 'sort_order' => 'desc']) }}">Oldest</a>
        <span class="mx-2">|</span>
        <a href="{{ route('todos.sort', ['sort_by' => 'created_at', 'sort_order' => 'asc']) }}"> Newest</a>
        <span class="mx-2">|</span>
        <a href="{{ route('todos.sort', ['sort_by' => 'created_at', 'sort_order' => 'desc', 'filter' => 'completed']) }}">Completed</a>
        <span class="mx-2">|</span>
        <a href="{{ route('todos.sort', ['sort_by' => 'created_at', 'sort_order' => 'desc', 'filter' => 'incomplete']) }}">Incomplete</a>
    </div>




{{-- *** List of Created new List *** --}}
    <div class="mt-2 container">
        @foreach ($todos as $todo)
        @if ($todo->user_id === auth()->id())
            <div id="todo-{{ $todo->id }}" class= "py-4 flex items-center border-b border-gray-300 px-3">
                <div class="flex-1 pr-8">
                    <h3 class="text-lg font-semibold">{{$todo->title}}</h3>
                    <p class="text-gray-500">{{$todo->description}}</p>
                    <p class="text-gray-400">Due Date: {{$todo->due_date}}</p>
                    <p class="text-gray-400">Created at: {{$todo->created_at}}</p>
                </div>  
        


                
    {{-- *** BUTTONS *** --}}
    <div class="flex space-x-3">

    {{-- *** EDIT BUTTON *** --}}
        <div>
            <button class="py-2 px-2 bg-yellow-500 text-white rounded-xl" onclick="editTodo({{ $todo->id }})">
                Edit
            </button>
        </div>

    {{-- *** CHECK BUTTON*** --}}
        <form method="POST" action="{{ route('todos.toggle', $todo->id) }}">
            @csrf
            @method('PATCH')
        
            <button type="submit" class="py-2 px-2 bg-blue-500 text-white rounded-xl">
                @if ($todo->isDone)

                    <!-- Show checkmark icon if task is Done -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                @else
                    <!-- Show X icon if task is not Done -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                        
                @endif
            </button>
        </form>

        {{--*** DELETE BUTTON *** --}}
        <form method="POST" action="{{ route('todos.destroy', $todo->id) }}">
            @csrf
            @method('DELETE')
            <button class="py-2 px-2  bg-red-500 text-white rounded-xl ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>                     
            </button> 
        </form>
    </div>
</div>        @endif
@endforeach

</div>

{{-- LOGOUT Button --}}
        <div class="py-10">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <button type="submit" class="w-28 py-4 px-8 bg-red-500 text-white rounded-xl">Logout</button>
                </form>
            @endauth
        </div>
    </div>

    

    




{{-- Javascript --}}
<script>

    // Redirect to the edit route with the todoId
    function editTodo(todoId) {
        window.location.href = `/edit/${todoId}`;
    }

</script>


</body>
</html>