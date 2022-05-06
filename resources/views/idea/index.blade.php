{{-- <x-app-layout>
    <livewire:ideas-index />
</x-app-layout> --}}

<h2>Home page</h2>
<span>
    @php
        dd(session('id'), session('first_name'), session('last_name'), session('bio'));
    @endphp
</span>