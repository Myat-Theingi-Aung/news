@extends('layouts.app')

@section('title') User | Profile  @endsection

@section('content')
    <div class="flex min-h-full pt-6 flex-col justify-center px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-5xl p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            @if(session('success'))
                <div class="bg-green-400 font-medium text-white px-4 py-2 rounded-md mt-2">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex flex-row justify-between px-4 pt-4 mb-0">
                <div class="flex flex-row items-center">
                    <div class="w-16 h-16 bg-indigo-600 text-white rounded-full text-3xl font-bold shadow-lg flex items-center justify-center">{{ substr($user->name, 0, 1) }}</div>
                    <div>
                        <h5 class="mb-1 text-xl ml-3 uppercase font-bold text-gray-900 dark:text-white">{{ $user->name }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</span>
                    </div>
                </div>
                @if (auth()->check() && auth()->user()->id === $user->id)
                    <button id="dropdownButton" data-dropdown-toggle="profile-dropdown" class="inline-block h-8 w-8 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="profile-dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="{{ route('user.edit', $user) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('change.password', $user) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Change Password</a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                        </li>
                        </ul>
                    </div>
                @endif
            </div>

            <div class="flex flex-col pt-2 pb-8">
                <p class="mt-4 text-center text-gray-600 dark:text-gray-400">
                    {{ $user->bio }}
                </p>
            </div>
        </div>
    </div>

    <div class="flex min-h-full pt-6 flex-col justify-center px-6 lg:px-8">
        @foreach($newsArticles as $news)
            <div class="sm:mx-auto sm:w-full sm:max-w-5xl mb-6 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex">
                    <a href="#" class="w-1/3">
                        @if ($news->photo !== null)
                            <img class="rounded-t-lg w-full h-60" src="{{ $news->photo }}" alt="" />
                        @else
                            <img class="rounded-t-lg w-full h-60" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmWSR-bANXE5sNDP3dyPJrFlCvku1OQ-gyTg&s" alt="" />
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

            </div>
        @endforeach
    </div>
@endsection
