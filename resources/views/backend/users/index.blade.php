<x-layouts.backend>
    <x-slot name="title">Users</x-slot>
    @if (session('alert'))
        <x-backend.alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">User</x-slot>
        </x-backend.alert>
    @endif
    <livewire:user-table/>
</x-layouts.backend>
