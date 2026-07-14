<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-bold">Usuarios</h3>
                    <p class="text-3xl mt-3">{{ $users }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-bold">Roles</h3>
                    <p class="text-3xl mt-3">{{ $roles }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-bold">Permisos</h3>
                    <p class="text-3xl mt-3">{{ $permissions }}</p>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>