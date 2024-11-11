@extends('base.base')

@section('title', "Tickets for {$movie->movie_title}")

@section('content')

<div class="pt-6 pb-10"></div>

<div class="container mx-auto px-4 mt-8">
    <!-- pesan sukses -->
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert" style="margin-top: 100px;">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-200 mb-6">Tickets for {{ $movie->movie_title }}</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mx-2">
        @forelse ($tickets as $ticket)
        <div class="ticket-container shadow-lg relative">
            <!-- tanda sudah check-in -->
            @if ($ticket->is_checked_in)
                <span class="bg-green-600 text-white px-3 py-1 text-xs font-semibold rounded-full absolute top-4 right-4 z-20">Checked In</span>
            @endif

            <div class="ticket-content bg-neutral-50 rounded-lg p-6 shadow-md">
                <div class="text-center mb-4">
                    <p class="text-lg font-semibold text-gray-900">{{ $movie->movie_title }}</p>
                </div>

                <div class="flex justify-between">
                    <div>
                        <div class="mb-2">
                            <p class="text-gray-500 text-sm">Customer Name</p>
                            <p class="text-xl font-bold text-gray-900">{{ $ticket->customer_name }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="text-gray-500 text-sm">Seat Number</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $ticket->seat_number }}</p>
                        </div>
                    </div>

                    <div class="text-left">
                        <div class="mb-2">
                            <p class="text-gray-500 text-sm">Date</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $ticket->check_in_time ? $ticket->check_in_time->format('Y-m-d') : 'N/A' }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="text-gray-500 text-sm">Time</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $ticket->check_in_time ? $ticket->check_in_time->format('H:i') : 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator"></div>

            <div class="ticket-actions bg-neutral-50 rounded-b-lg text-center py-3 shadow-md">
                @if (!$ticket->is_checked_in)
                    <a href="{{ route('ticket.edit', $ticket->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg inline-block">Edit</a>
                    <form action="{{ route('ticket.checkin', $ticket->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">Check In</button>
                    </form>
                    <form action="{{ route('ticket.delete', $ticket->id) }}" method="POST" onsubmit="return confirmDelete();" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Delete</button>
                    </form>
                @else
                    <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed opacity-50 inline-block" onclick="showError('Editing is not allowed after check-in.');">Edit</button>
                    <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed opacity-50 inline-block" onclick="showError('Deletion is not allowed after check-in.');">Delete</button>
                @endif
            </div>
        </div>
        @empty
        <p class="text-gray-600 dark:text-gray-400">No tickets available for this movie.</p>
        @endforelse
    </div>
</div>

<script>
    function showError(message) {
        alert(message);
    }

    function confirmDelete() {
        return confirm('Are you sure you want to delete this ticket?');
    }
</script>

@vite('resources/css/tickets.css')

@endsection
