@extends('partials.layout')

@section('content')
    {{--Last 30 days--}}
    <div class="container mx-auto p-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Last 30 days</h3>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total Subscribers</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">71,897</dd>
            </div>

            <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Avg. Open Rate</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">58.16%</dd>
            </div>

            <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Avg. Click Rate</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">24.57%</dd>
            </div>
        </dl>
    </div>

    {{--Table--}}
    <div class="align-middle inline-block min-w-full border-b border-gray-200">
        <table class="min-w-full">
            <thead>
            <tr class="border-t border-gray-200">
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <span class="lg:pl-2">Applications</span>
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SSL</th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Members</th>
                <th class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Last updated</th>
                <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($applications as $application)
                    <tr>
                        <td class="px-6 py-3 max-w-0 w-full whitespace-nowrap text-sm font-medium text-gray-900">
                            <div class="flex items-center space-x-3 lg:pl-2">
                                <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600" aria-hidden="true"></div>
                                <a href="{{route('application.show', ['application' => $application->id])}}" class="truncate hover:text-gray-600">
                          <span>
                            {{$application->name}}
                          </span>
                                </a>
                            </div>
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right">
                            @include('partials.ssl-icon')
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-500 font-medium">
                            <div class="flex items-center space-x-2">
                                <div class="flex flex-shrink-0 -space-x-1">
                                    <img class="max-w-none h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Dries Vincent">

                                    <img class="max-w-none h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Lindsay Walton">

                                    <img class="max-w-none h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Courtney Henry">

                                    <img class="max-w-none h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Tom Cook">
                                </div>

                                <span class="flex-shrink-0 text-xs leading-5 font-medium">+8</span>
                            </div>
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right">{{$application->updated_at}}</td>
                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
