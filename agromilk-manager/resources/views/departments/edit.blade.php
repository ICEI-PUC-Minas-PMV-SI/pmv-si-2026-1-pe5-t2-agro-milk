<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Editar departamento
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('departments.update', $department) }}" method="POST">
                    @method('PUT')
                    @include('departments._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
