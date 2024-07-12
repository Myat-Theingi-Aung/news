@extends('layouts.app')

@section('title') News | Show  @endsection

@section('content')
    <div class="mt-5 px-4 py-4 grid grid-cols-1 ">
        <div class=" bg-white m-4 dark:bg-gray-800 dark:border-gray-700">
            @if(session('success'))
                <div class="bg-green-400 mb-4 font-medium text-white px-4 py-2 rounded-md mt-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 mr-2 bg-indigo-600 text-white rounded-full text-2xl font-bold shadow-lg flex items-center justify-center">{{ substr($news->user->name, 0, 1) }}</div>
                    <a href="{{ route('user.show', $news->user)}}">{{ $news->user->name }}</a>
                </div>

                <div class="flex flex-row-reverse">
                    <div>
                        <a href="{{ route('home') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Back
                        </a>
                    </div>
                    @if (auth()->check() && auth()->user()->id == $news->user_id)
                        <div class="mx-2">
                            <form id="news" action="{{ route('news.destroy', $news) }}" method="POST" style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                            <a href="{{ route('news.destroy', $news) }}" id="delete-button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Delete
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('news.edit', $news) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Edit
                            </a>
                        </div>
                    @endif
                </div>

            </div>
            <a href="#">
                @if ($news->photo !== null)
                    <img class="rounded-t-lg h-60" src="{{ $news->photo }}" alt="" />
                @else
                    <img class="rounded-t-lg w-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmWSR-bANXE5sNDP3dyPJrFlCvku1OQ-gyTg&s" alt="" />
                @endif
            </a>
            <div class="py-5">
                <a href="{{ route('news.show', $news) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $news->title }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $news->content }}</p>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
