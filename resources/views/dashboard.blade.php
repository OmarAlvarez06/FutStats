<x-app-layout>

    <div class="w-full relative mt-4 shadow-2xl rounded my-24 overflow-hidden">
        <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
            <img src="https://source.unsplash.com/random" alt="Imagen De Fondo" class="bg w-full h-full object-cover object-center absolute z-0">
            <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
            <img src="{{'/storage/'.Auth::user()->profile_photo_path}}" class="h-24 w-24 object-cover rounded-full">
            <h1 class="text-2xl font-semibold">{{Auth::user()->name}}</h1>
            <h1 class="text-2xl font-semibold">{{Auth::user()->username}}</h1>
            <h4 class="text-sm font-semibold"><b>Miembro Desde </b>{{Auth::user()->created_at}}</h4>
        </div>
    </div>
    <div class=" bg-white ">
  
        <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
            <div class="px-4 pt-4">
                <form action="#" class="flex flex-col space-y-8">
        
                <div>
                    <h3 class="text-2xl font-semibold">Información Del Usuario</h3>
                    <hr>
                </div>
        
                <div class="form-item">
                    <label class="text-xl ">Nombre</label>
                    <input type="text" value="{{Auth::user()->name}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                </div>
        
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
        
                    <div class="form-item w-full">
                    <label class="text-xl ">Rol</label>
                    <input type="text" value="{{Auth::user()->rol}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                    </div>
        
                    <div class="form-item w-full">
                    <label class="text-xl ">Correo</label>
                    <input type="text" value="{{Auth::user()->email}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                    </div>

                    <div class="form-item w-full">
                        <label class="text-xl ">Telefono</label>
                        <input type="text" value="{{Auth::user()->telephone}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                        </div>
                </div>

                
                </form>
            </div>
        </div>
   
    </div>
</x-app-layout>
