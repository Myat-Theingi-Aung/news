@extends('layouts.app')

@section('title') News | Create  @endsection

@section('content')
<div class="flex min-h-full pt-6 flex-col justify-center px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">Create News</h2>
        </div>

        <div>
            <form action="{{ route('news.store') }}" class="space-y-4" method="POST">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input id="title" name="title" type="text" value="{{ old('title') }}" autocomplete="title" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('title')
                        <div class="text-red-700 text-sm font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                    <div class="mt-2">
                        <textarea name="content" id="content" rows="4" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            {{ old('content') }}
                        </textarea>
                    </div>
                    @error('content')
                        <div class="text-red-700 text-sm font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900">Published Date</label>
                    <div class="mt-2">
                        <input type="date" name="published_at" id="published_at" {{ old('published_at') }} class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('published_at') }}">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full mt-8 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

