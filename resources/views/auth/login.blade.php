<!DOCTYPE html>
<html :class="{ 'theme-dark': !dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../assets/js/init-alpine.js"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="https://images.unsplash.com/photo-1638913662584-731da41f5a59?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="https://images.unsplash.com/photo-1638913662584-731da41f5a59?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    
                        <div class="w-full">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ __('Login') }}
                            </h1>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">{{ __('E-Mail Address') }}</span>
                                <input
                                    class="@error('email') is-invalid @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="infocliq.net@gmail.com"
                                    id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                     />
                                     @error('email')
                                    <span class="text-red-600" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">{{ __('Password') }}</span>
                                <input
                                    class="@error('password') is-invalid @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="***************" id="password" type="password" name="password" required autocomplete="current-password"/>
                                    @error('password')
                                    <span class="text-red-600" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </label>
    
                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                {{ __('Login') }}
                            </button>
                            {{-- <p class="mt-4">
                                @if (Route::has('password.request'))
                                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </p> --}}
                        </form>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>