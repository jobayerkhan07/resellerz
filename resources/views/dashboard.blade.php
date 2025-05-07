<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @role('Admin')
                    <h1>Welcome Admin!</h1>
                    <p>You can manage resellers and clients.</p>
                    @elserole('Reseller')
                    <h1>Welcome Reseller!</h1>
                    <p>You can manage your clients.</p>
                    @elserole('Client')
                    <h1>Welcome Client!</h1>
                    <p>You can view your profile and orders.</p>
                    @else
                        <h1>Unknown Role</h1>
                        @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
