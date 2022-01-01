@extends('layouts.app')

@section('content')
<div class="container px-6 mx-auto grid">
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Customers
  </h2>
  @if ($message = Session::get('success'))
  <div class="relative py-3 pl-2 mb-4 pr-10 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">    
      <p>{{ $message }}</p>
  </div>
  @endif
  <!-- Table -->
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Email address</th>
            <th class="px-4 py-3">Create at</th>
            <th class="px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($customers as $customer)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
              <div class="flex items-center text-sm">
                <!-- Avatar with inset shadow -->
                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full"
                    src="https://www.pngkey.com/png/detail/114-1149878_setting-user-avatar-in-specific-size-without-breaking.png"
                    alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">{{$customer->name}}</p>
                  <p class="text-xs text-gray-600 dark:text-gray-400">
                    @if ($customer->staus == 1)
                    Active user   
                    @else
                    Deactivated                 
                    @endif
                    
                  </p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-sm">
              {{$customer->email}}
            </td>
            <td class="px-4 py-3 text-sm">
              {{$customer->created_at}}
            </td>
            <td class="px-4 py-3 text-sm">
              <span class="text-purple-600 mr-1">
                @if ($customer->staus == 1)
                <form action="{{URL('update-customer/'.$customer->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input hidden name="staus" value="0" type="text">                
                  <button class="appearance-none">Deactive</button>
                </form>
                  @else
                  <form action="{{URL('update-customer/'.$customer->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input hidden name="staus" value="1" type="text">                
                    <button class="appearance-none">Active</button>
                  </form>                                    
                @endif
              </span>
              <span class="text-red-600"><a href="{{url('delete-customer/'.$customer->id)}}">Remove</a></span>
            </td>
          </tr>              
          @endforeach          
        </tbody>
      </table>
    </div>
    <div
      class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      <span class="flex items-center col-span-3">
        Showing 21-30 of 100
      </span>
      <span class="col-span-2"></span>
      <!-- Pagination -->
      <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Table navigation">
          <ul class="inline-flex items-center">
            <li>
              <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                aria-label="Previous">
                <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                  <path
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
              </button>
            </li>
            <li>
              <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                1
              </button>
            </li>
            <li>
              <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                2
              </button>
            </li>
            <li>
              <button
                class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                3
              </button>
            </li>
            <li>
              <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                4
              </button>
            </li>
            <li>
              <span class="px-3 py-1">...</span>
            </li>
            <li>
              <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                8
              </button>
            </li>
            <li>
              <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                9
              </button>
            </li>
            <li>
              <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                aria-label="Next">
                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                  <path
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
              </button>
            </li>
          </ul>
        </nav>
      </span>
    </div>
  </div>
</div>
@endsection
