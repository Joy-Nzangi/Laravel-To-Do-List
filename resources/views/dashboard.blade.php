<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <br>
                    {{-- <a href="{{route('todos.index')}}" class="text-blue-500 hover:text-blue-950">To Do List</a> --}}
                </div>
            </div>
        </div>
    </div>


    {{-- Payment  --}}
    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-5xl text-center mb-3" >Purchase <br> To Do List app </h1>
        <h4 class="font-thin text-center mb-8">You will Stop Procastinating!</h4>

        <h4 class="font-bold text-2xl text-center">Mpesa</h4>
        <h4 class="font-thin text-center ">Cost: Ksh. 1</h4>

        {{-- MPESA  --}}
        <div class="mb-6">
            <form class="flex flex-col space-y-4" action="{{ route('mpesa.stkSimulation') }}" method="POST">
                @csrf
                <input class="py-3 px-4 bg-gray-100 rounded-xl" type="text" name="phone" placeholder="put phone number like so 254712345678" >
                <button class="py-3 px-4 bg-blue-500 text-white rounded-xl">Submit</button>
            </form>
        </div>
                        
    </div>
</x-app-layout>
