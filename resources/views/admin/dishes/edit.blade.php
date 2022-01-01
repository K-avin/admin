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
    <form action="{{URL('update-dish/'.$dish->id)}}" method="post" enctype="multipart/form-data" class="w-full max-w-lg">
      @csrf
      <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Restaurant
              </label>
              <div class="relative">
                <select name="restaurant" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                  {{-- <option value="{{$dish->restaurant}}">{{$dish->restaurant}}</option> --}}
                  @foreach ($restaurant as $rest)
                  <option value="{{$rest->name}}">{{$rest->name}}</option>
                  @endforeach
                </select>
              </div>
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Dishe Name
          </label>
          <input value="{{$dish->name}}" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Enter the restaurant location">
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Catogory
              </label>
              <div class="relative">
                <select name="category" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                  @foreach ($categorys as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>                      
                  @endforeach                  
                </select>
              </div>
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Price
          </label>
          <input value="{{$dish->price}}" name="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Enter the restaurant location">
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="user_avatar">Upload file</label>
          <input value="{{$dish->image}}" name="image" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" aria-describedby="user_avatar_help" id="user_avatar" type="file">
        </div>

        <div class="w-full md:w-1 px-3 mt-6 mb-3">
          <button type="submit" name="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Save
          </button>
          <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red">
            Cancel
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
