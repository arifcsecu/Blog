@extends('components.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto" >
    <p class="text-center text-4xl font-medium text-indigo-600 antialiased">Manages Blog Post</p>

    <div class="mt-3">
        @livewire('Posts')
    </div>
</div>

@endsection