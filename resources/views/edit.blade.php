@extends('base.base')

@section('title', "Edit Ticket for {$ticket->customer_name}")

@section('content')
<div class="pt-6 pb-20"></div>

<!-- pesan sukses -->
@if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert" style="margin-top: 100px;">
        <p class="font-bold">Success!</p>
        <p>{{ session('success') }}</p>
    </div>
@endif

<h2 class="text-lg font-semibold ml-5 mb-6 text-gray-800 dark:text-gray-100">Edit Ticket for {{ $ticket->customer_name }}</h2>

<form action="{{ route('ticket.update', $ticket->id) }}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-xl px-8 pt-8 pb-6 mb-6 mx-4">
    @csrf
    @method('PUT')

    <div class="mb-6">
        <label class="block text-gray-600 dark:text-gray-300 text-sm font-semibold mb-2" for="customer_name">Customer Name</label>
        <input class="shadow-sm border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 dark:text-gray-100 bg-gray-100 dark:bg-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 @error('customer_name') is-invalid @enderror" 
               id="customer_name" name="customer_name" type="text" placeholder="Enter customer name" value="{{ old('customer_name', $ticket->customer_name) }}" required>
        @error('customer_name')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block text-gray-600 dark:text-gray-300 text-sm font-semibold mb-2" for="seat_number">Seat Number</label>
        <input class="shadow-sm border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 dark:text-gray-100 bg-gray-100 dark:bg-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 @error('seat_number') is-invalid @enderror" 
               id="seat_number" name="seat_number" type="text" placeholder="Enter seat number (maximum 5 characters)" maxlength="5" value="{{ old('seat_number', $ticket->seat_number) }}" required>
        @error('seat_number')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
    </div>

    <!-- dropdown untuk mengganti film -->
    <div class="mb-6">
        <label class="block text-gray-600 dark:text-gray-300 text-sm font-semibold mb-2" for="movie_id">Movie</label>
        <select name="movie_id" id="movie_id" class="shadow-sm border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 dark:text-gray-100 bg-gray-100 dark:bg-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500" required>
            @foreach ($movies as $movie)
                <option value="{{ $movie->id }}" {{ $movie->id == $ticket->movie_id ? 'selected' : '' }}>
                    {{ $movie->movie_title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex items-center justify-end">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300" type="submit">
            Update Ticket
        </button>
    </div>
</form>
</div>
@endsection
