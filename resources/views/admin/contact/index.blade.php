<x-app-layout>
    @include('components.admin.header')

    <div class="py-12 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 px-24 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 m-6 rounded mx-auto bg-white">
                    <h2 class="text-xl text-center ">Messages</h2>
                    <div class="px-8 py-6">
                        <livewire:contact.get-messages>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
