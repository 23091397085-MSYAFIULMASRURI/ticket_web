@extends('layouts.main')

@section('title', 'Profile')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>



            @if (auth()->user()->role === 'user')
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @if (!auth()->user()->is_requesting_organizer)
                            <form action="{{ route('organizer.request') }}" method="POST" class="mt-4">
                                @csrf
                                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
                                    Ajukan Diri Sebagai Organizer
                                </button>
                            </form>
                        @else
                            <p class="text-yellow-400 mt-4">Permintaan menjadi organizer sedang diproses.</p>
                        @endif
                    </div>
                </div>
            @endif


        </div>
    </div>

@endsection
