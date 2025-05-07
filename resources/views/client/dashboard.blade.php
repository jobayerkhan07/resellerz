@extends('layouts.dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Client Dashboard</h2>

    <div class="bg-white shadow p-4 rounded">
        <h3 class="font-semibold">Profile Information</h3>
        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    </div>

    <div class="bg-white shadow p-4 rounded mt-4">
        <h3 class="font-semibold">Assigned Reseller/Admin</h3>
        <p>Coming soon...</p>
    </div>
@endsection
