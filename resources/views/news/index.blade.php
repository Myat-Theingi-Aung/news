@extends('layouts.app')

@section('title') News | Index  @endsection

@section('content')
    <div class="mt-5 px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
        @foreach($newsArticles as $news)
            <div class=" bg-white border m-4 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    @if ($news->photo !== null)
                        <img class="rounded-t-lg w-full h-60" src="{{ $news->photo }}" alt="" />
                    @else
                        <img class="rounded-t-lg w-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmWSR-bANXE5sNDP3dyPJrFlCvku1OQ-gyTg&s" alt="" />
                    @endif
                </a>
                <div class="p-5">
                    <div class="flex justify-between">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 mr-2 bg-indigo-600 text-white rounded-full text-2xl font-bold shadow-lg flex items-center justify-center">{{ substr($news->user->name, 0, 1) }}</div>
                            <a href="{{ route('user.show', $news->user)}}">{{ $news->user->name }}</a>
                        </div>
                        @if (auth()->check() && auth()->user()->id == $news->user_id)
                            <div class="flex flex-row-reverse">
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
                                    <a href="{{ route('news.edit', $news) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <a href="{{ route('news.show', $news) }}">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $news->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::words($news->content, 30, '...'); }}</p>
                    <a href="{{ route('news.show', $news) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js')}}"></script>
@endpush
