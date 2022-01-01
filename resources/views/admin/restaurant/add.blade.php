@extends('layouts.app')

@section('content')
<div class="container px-6 mx-auto grid">
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Add New Restaurant
  </h2>
  @if ($message = Session::get('success'))
  <div class="relative py-3 pl-2 mb-4 pr-10 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">    
      <p>{{ $message }}</p>
  </div>
  @endif

  @if (count($errors) > 0)
  <div class="relative py-3 pl-2 mb-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  </div>
  @endif    

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <form class="w-full max-w-lg" action="{{route('add-restaurant')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-3">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
              Restaurant Name
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Enter the restaurant name" name="name">
            {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
          </div>
          <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Location
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Enter the restaurant location" name="location">
          </div>
          <div class="w-full md:w-1/2 px-3">
            <button type="submit" name="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Save
            </button>
            <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red">
              <a href="/restaurants">Cancel</a>
            </button>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection
