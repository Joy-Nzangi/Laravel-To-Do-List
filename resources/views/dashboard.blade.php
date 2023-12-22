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

        <h4 class="font-bold text-2xl text-center">Price: 10 KES</h4>
        {{-- <h4 class="font-thin text-center">Till number: 123456</h4> --}}
        {{-- <h4 class="font-thin text-center ">Cost: Ksh. 1</h4> --}}

        {{-- <div class="mb-6">
            <form class="flex flex-col space-y-4" action="" method="POST">
                @csrf
            <input class="py-3 px-4 bg-gray-100 rounded-xl" type="text" name="title" placeholder="Enter Mpesa code" >
            <button class="py-3 px-4 bg-blue-500 text-white rounded-xl">Submit</button>
        </div> --}}
                
        
{{-- paystack --}}
        <div class="mb-6 py-3">
            <form id="paymentForm">
                <div class="flex flex-col space-y-4"">
                  <button class="py-3 px-4 bg-blue-500 text-white rounded-xl" type="submit" onclick="payWithPaystack()"> Pay with Mpesa </button>
                </div>
              </form>
        </div>
          


          




    </div>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>

const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: "{{ env('PAYSTACK_PUBLIC_KEY')}}",
    email: "joynzangi@gmail.com",
    amount: 1000,
    currency: "KES",

    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
    //   let message = 'Payment complete! Reference: ' + response.reference;
    //   alert(message);
    window.location.href = "{{route('todos.index')}}" + response.redirecturl;
    }
  });

  handler.openIframe();
}


    </script>
</x-app-layout>
