<x-Profil-layout>





    <div style="display: flex; align-items: center;justify-content: center;">
                <a href="#" class="flex-none">
                   <img src="{{ asset('uploads/'.$collection['photos']) }}" width="70px" height="70px" alt="Image">
                </a>
    </div>


    
    <div class="post-container bg-white rounded-xl flex hover:shadow-card transition duration-150 easy-in cursor-pointer"  style="align-items: center;justify-content: center; background-color: #FFFFFF;  margin-right: 500px;
  margin-top: 50px;  margin-left: 500px;border-radius: 5%">




<form method="POST" action="{{ route('profil.update', $collection['id']) }}" enctype="multipart/form-data" >
                        @method('PUT')
                        @csrf

                        {{ csrf_field() }}
                 <input type="file" name="photos" accept="image/png, image/jpeg">
                        <!-- <input type="hidden" name="_method" value="PUT"> -->

                        <input type="text" name="id" value="{{ $collection['id'] ? $collection['id'] : old('id') }}" class="form-control" placeholder="Name" hidden/>

                <!-- Name -->
                <div>
                    <x-label for="first_name" :value="__('first_name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="first_name" value="{{ $collection['first_name'] ? $collection['first_name'] : old('first_name') }}" required autofocus />
                </div>


                <div>
                    <x-label for="last_name" :value="__('last_name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="last_name" value="{{ $collection['last_name'] ? $collection['last_name'] : old('last_name') }}" required autofocus />
                </div>


                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $collection['email'] ? $collection['email'] : old('email') }}" required />
                </div>

                <!-- bio -->
                <div>
                    <x-label for="bio" :value="__('bio')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="bio" value="{{ $collection['bio'] ? $collection['bio'] : old('bio') }}" required autofocus />
                </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Change password') }}
                        </a>

                        <x-button class="ml-4">
                            {{ __('Save') }}
                        </x-button>
                    </div>
</form>
</x-profil-layout>



