@extends('layouts.app')

@section('title') News | Reset Password  @endsection

@section('content')
    <div class="flex min-h-full pt-6 flex-col justify-center px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">Reset Password</h2>
            </div>

            @if(session('error'))
                <div class="bg-red-400 font-medium text-white px-4 py-2 rounded-md mt-2">
                    {{ session('error') }}
                </div>
            @endif

            <div>
                <form action="{{ route('reset.update', $user) }}" class="space-y-4" method="POST">
                    @csrf
                    @method('put')

                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('password')
                            <div class="text-red-700 text-sm font-medium">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Password Confirmation</label>
                        <div class="mt-2">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('password_confirmation')
                            <div class="text-red-700 text-sm font-medium">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="flex w-full mt-8 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

