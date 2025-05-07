@extends('layouts.dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Reseller Dashboard</h2>

    <div class="grid grid-cols-2 gap-6">
        <div class="bg-white shadow p-4 rounded">
            <h3 class="font-semibold">Your Clients</h3>
            <p class="text-2xl">45</p>
        </div>

        <div class="bg-white shadow p-4 rounded">
            <h3 class="font-semibold">Pending Registrations</h3>
            <p class="text-2xl">3</p>
        </div>
    </div>
@endsection
