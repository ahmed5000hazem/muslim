<x-app-layout>
    @include('components.admin.header')

    <div class="py-12 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 px-24 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 m-6 rounded  mx-auto bg-white">
                    <h2 class="text-xl"> Art Work Categories </h2>
                    @foreach ($cases as $case => $value)
                        <div class="px-8 py-6 border-t-4">
                            <h2 class="text-center text-xl text-blue-600"> {{$value}} </h2>
                            <livewire:work-category :type="$case" :category="$value">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
