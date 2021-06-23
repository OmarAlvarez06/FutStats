<x-app-layout>
    <div class="w-full h-5/6 absolute mt-4 shadow-2xl rounded my-24 overflow-hidden">
        <img src="https://source.unsplash.com/1600x900/?nature,paisaje" alt="Imagen De Fondo" class="bg w-full h-full object-none object-center absolute z-0">
        <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
            <img src="{{'/storage/'.Auth::user()->profile_photo_path}}" class="h-56 w-56 object-cover rounded-full">
            <h1 class="text-2xl font-semibold">{{Auth::user()->name}}</h1>
            <h1 class="text-2xl font-semibold">{{Auth::user()->username}}</h1>
            <h1 class="text-2xl font-semibold">{{Auth::user()->email}}</h1>
            <h4 class="text-sm font-semibold"><b>Miembro Desde </b>{{Auth::user()->created_at}}</h4>
        </div>
    </div>
</x-app-layout>
