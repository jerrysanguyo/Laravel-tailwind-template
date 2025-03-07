<div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="fixed inset-0 bg-black opacity-50" @click="showModal = false"></div>
    <div x-show="showModal" x-cloak x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="bg-white rounded-lg shadow-lg z-10 p-6 w-full max-w-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Add New Record</h2>
            <button @click="showModal = false"
                class="text-gray-600 hover:text-gray-800 text-2xl leading-none">&times;</button>
        </div>
        <form action="#" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="flex justify-end">
                <button type="button" @click="showModal = false"
                    class="px-4 py-2 mr-2 text-black rounded-lg hover:bg-gray-300 transition-colors">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 text-white bg-gray-700 rounded-lg hover:bg-gray-300 hover:text-black transition-colors">Submit</button>
            </div>
        </form>
    </div>
</div>