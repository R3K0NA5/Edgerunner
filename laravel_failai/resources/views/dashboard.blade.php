@include('layouts.header')
<x-app-layout>
    <x-slot>
        {{ __('Dashboard') }}
    </x-slot>
    <div>
        {{ __("You're logged in!") }}
    </div>
</x-app-layout>
@include('layouts.footer')
