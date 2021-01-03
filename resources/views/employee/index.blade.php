@extends('layouts.app')
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Employee's Lists
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="/hrms/employee/register" class="button text-white bg-theme-1 shadow-md mr-2">Register Employee</a>
            <div class="dropdown">
                <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="more-horizontal"></i> </span>
                </button>
                <div class="dropdown-box w-40">
                    <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> Add Group </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="message-circle" class="w-4 h-4 mr-2"></i> Send Message </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600">Showing {{ $employees->currentPage() }} to {{ $employees->count() }}  of {{ $employees->total() }} Entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Employees Layout -->
        @if($employees) @foreach($employees as $k => $v)
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="{{$v->name}}" class="rounded-full" src="/resources/employees/profiles/{{$v->username}}/{{$v->profile_image}}">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">{{$v->name}}</a>
                        <div class="text-gray-600 text-xs mt-0.5">Department : {{!empty($v->department) ? $v->department->name : 'New Join'}}</div>
                        <div class="text-gray-600 text-xs mt-0.5">Role : {{!empty($v->role) ? $v->role->title : 'New Join'}}</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-dark-5 ml-2 text-gray-500 zoom-in tooltip" title="Facebook"> <i class="w-3 h-3 fill-current" data-feather="facebook"></i> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-dark-5 ml-2 text-gray-500 zoom-in tooltip" title="Twitter"> <i class="w-3 h-3 fill-current" data-feather="twitter"></i> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-dark-5 ml-2 text-gray-500 zoom-in tooltip" title="Linked In"> <i class="w-3 h-3 fill-current" data-feather="linkedin"></i> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-gray-600 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="w-full h-1 mt-2 bg-gray-400 dark:bg-dark-1 rounded-full">
                            <div class="w-1/4 h-full bg-theme-1 dark:bg-theme-10 rounded-full"></div>
                        </div>
                    </div>
                    <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                    <a href="/hrms/employee/{{$v->id}}/profile"  class="button button--sm text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300">Profile</a>
                </div>
            </div>
        </div>
        @endforeach @endif
        <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <ul class="pagination">
                <li class="{{ $employees->currentPage() - 1 <= 0 ? 'hidden' : '' }}">
                    <a class="pagination__link" href="{{ $employees->url(1) }}"> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                </li>
                <li class="{{ $employees->currentPage() - 1 <= 0 ? 'hidden' : '' }}">
                    <a class="pagination__link" href="{{ $employees->previousPageUrl() }}"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                </li>
                <li class="{{ $employees->currentPage() - 1 <= 0 ? 'hidden' : '' }}"> <a class="pagination__link" href="{{ $employees->previousPageUrl() }}">{{ $employees->currentPage() - 1 <= 0 ? '' : $employees->currentPage() - 1 }}</a> </li>
                <li> <a class="pagination__link pagination__link--active" href="{{ $employees->url($employees->currentPage()) }}">{{ $employees->currentPage() }}</a> </li>
                <li class="{{ !$employees->hasMorePages()  ? 'hidden' : '' }} "> <a class="pagination__link" href="{{ $employees->nextPageUrl() }}">{{ $employees->currentPage() + 1 }}</a> </li>
                <li class="{{ !$employees->hasMorePages()  ? 'hidden' : '' }} ">
                    <a class="pagination__link" href="{{ $employees->nextPageUrl() }}"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                </li>
                <li class="{{ !$employees->hasMorePages()  ? 'hidden' : '' }} ">
                    <a class="pagination__link {{ !$employees->hasMorePages() ? 'hidden' : '' }}" href="{{ $employees->url($employees->lastPage()) }}"> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                </li>
            </ul>
            <select class="w-20 input box mt-3 sm:mt-0 {{ !$employees->hasMorePages()  ? 'hidden' : '' }}">
                <option>{{ $employees->perPage() }}</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
