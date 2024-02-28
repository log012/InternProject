<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body style="background-color: #F4F4F4">

    <div class="container ">
        <div class="row justify-content-center">
            <div class="border rounded form-group col-md-4 xl:w-[53%] lg:w-[47%] md:w-[45%] sm:w-[50%] w-[60%]"
                style="padding: 20px 40px; margin-top:6rem; box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.2); background-color: #FFF">
                <form method="POST" action="{{ route('register') }}"> {{-- change the route to the login route --}}
                    @csrf
                    
                    <div class="h2" style="font-weight: 700; color: #4267B2">Register</div>
                    <div class="flex flex-row flex-wrap justify-between mb-3">
                        <!-- Name -->
                        <div class="mt-4 my-2 ">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 sm:w-[15rem] md:w-[17rem] lg:w-[25rem] xl:w-[18rem] " type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4 my-2 ">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 sm:w-[15rem] md:w-[17rem] lg:w-[25rem] xl:w-[18rem] " type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 my-2 ">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 sm:w-[15rem] md:w-[17rem] lg:w-[25rem] xl:w-[18rem] " type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4 my-2 ">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 sm:w-[15rem] md:w-[17rem] lg:w-[25rem] xl:w-[18rem] " type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>


                    <button type="submit" class="btn mb-3 font-bold text-[#F4F4F4]"
                        style="background-color: #4267B2; color: #F4F4F4">Register</button> {{-- change the route to the for login to save in database --}}

                </form>
                <div class="mb-3">
                    <hr style="color: rgba(0, 0, 0, 0.3)">
                    <h6 class="font-bold mt-2 mb-1 text-[#16233C]">Already have an account</h6>
                    <a href="/login" class="text-[#4267B2] font-semibold underline">Login</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
