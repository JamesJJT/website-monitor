@extends('partials.layout')

@section('content')
    <div class="max-w-7xl mx-auto px-8 items-center mt-6 mb-6  bg-white border-gray-200 rounded-lg">
        <form class="space-y-8 divide-y divide-gray-200" method="POST" action="{{route('application.store')}}">
            @csrf
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 pt-4">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Application</h3>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Application name </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="name" id="name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="url" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Application URL </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="url" id="url" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5 pb-5">
                <div class="flex justify-end">
                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
