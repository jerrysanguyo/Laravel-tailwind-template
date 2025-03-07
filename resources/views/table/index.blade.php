@extends('layouts.dashboard')

@section('content')
<div x-data="tableData()" x-init="init()" class="container mx-auto p-6">

    <nav class="mb-4">
        <ol class="flex items-center space-x-2 text-sm">
            <li>
                <a href="#" class="font-medium text-blue-500 hover:text-blue-600">CMS</a>
            </li>
            <li>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
            </li>
            <li class="font-medium text-gray-700">Table</li>
        </ol>
    </nav>
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-2 text-center text-gray-800">Records</h1>

        <div class="flex justify-between mb-3">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" x-model="searchTerm" id="table-search-users"
                    class="block p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search for users">
            </div>
            <div x-data="{ showModal: false }">
                <!-- Trigger Button -->
                <button @click="showModal = true"
                    class="mt-1 px-5 py-2 text-white bg-gray-700 rounded-lg hover:bg-gray-100 hover:text-black hover:border border-gray-300 transition-colors">
                    <i class="fa-solid fa-plus"></i> Add
                </button>
                @include('table.modal.create')
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-200">
                    <tr class="text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-4 cursor-pointer" @click="sortBy('id')">
                            ID <span x-text="sortKey === 'id' ? (sortAsc ? '↑' : '↓') : ''"></span>
                        </th>
                        <th class="py-3 px-4 cursor-pointer" @click="sortBy('name')">
                            Name <span x-text="sortKey === 'name' ? (sortAsc ? '↑' : '↓') : ''"></span>
                        </th>
                        <th class="py-3 px-4 cursor-pointer" @click="sortBy('email')">
                            Email <span x-text="sortKey === 'email' ? (sortAsc ? '↑' : '↓') : ''"></span>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <template x-for="record in paginatedRecords" :key="record.id">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-4 whitespace-nowrap" x-text="record.id"></td>
                            <td class="py-3 px-4" x-text="record.name"></td>
                            <td class="py-3 px-4" x-text="record.email"></td>
                        </tr>
                    </template>
                    <tr x-show="paginatedRecords.length === 0">
                        <td colspan="3" class="py-4 text-center">No records found.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-end mt-3 space-x-2">
            <button @click="prevPage()" :disabled="currentPage === 1"
                class="px-4 py-2 text-black rounded-lg hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                Previous
            </button>
            <template x-for="page in totalPages" :key="page">
                <button @click="currentPage = page"
                    :class="{'bg-gray-700 text-white': currentPage === page, 'text-black': currentPage !== page}"
                    class="px-4 py-2 rounded-lg transition-colors hover:bg-gray-200 hover:text-black">
                    <span x-text="page"></span>
                </button>
            </template>
            <button @click="nextPage()" :disabled="currentPage === totalPages"
                class="px-4 py-2 text-black rounded-lg hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                Next
            </button>
        </div>
    </div>
</div>

<script>
function tableData() {
    return {
        searchTerm: '',
        sortKey: 'id',
        sortAsc: true,
        currentPage: 1,
        pageSize: 10,
        records: [],
        init() {
            this.records = [{
                    id: 1,
                    name: 'John Doe',
                    email: 'john@example.com'
                },
                {
                    id: 2,
                    name: 'Jane Smith',
                    email: 'jane@example.com'
                },
                {
                    id: 3,
                    name: 'Alice Johnson',
                    email: 'alice@example.com'
                },
                {
                    id: 4,
                    name: 'Bob Williams',
                    email: 'bob@example.com'
                },
                {
                    id: 5,
                    name: 'Michael Brown',
                    email: 'michael@example.com'
                },
                {
                    id: 6,
                    name: 'Lisa Davis',
                    email: 'lisa@example.com'
                },
                {
                    id: 7,
                    name: 'David Wilson',
                    email: 'david@example.com'
                },
                {
                    id: 8,
                    name: 'Karen Taylor',
                    email: 'karen@example.com'
                },
                {
                    id: 9,
                    name: 'Chris Moore',
                    email: 'chris@example.com'
                },
                {
                    id: 10,
                    name: 'Patricia Anderson',
                    email: 'patricia@example.com'
                },
                {
                    id: 11,
                    name: 'Steven Thomas',
                    email: 'steven@example.com'
                },
                {
                    id: 12,
                    name: 'Nancy Jackson',
                    email: 'nancy@example.com'
                },
                {
                    id: 13,
                    name: 'Eric White',
                    email: 'eric@example.com'
                },
                {
                    id: 14,
                    name: 'Donna Harris',
                    email: 'donna@example.com'
                },
                {
                    id: 15,
                    name: 'George Martin',
                    email: 'george@example.com'
                },
                {
                    id: 16,
                    name: 'Susan Thompson',
                    email: 'susan@example.com'
                },
                {
                    id: 17,
                    name: 'Robert Garcia',
                    email: 'robert@example.com'
                },
                {
                    id: 18,
                    name: 'Linda Martinez',
                    email: 'linda@example.com'
                },
                {
                    id: 19,
                    name: 'James Robinson',
                    email: 'james@example.com'
                },
                {
                    id: 20,
                    name: 'Barbara Clark',
                    email: 'barbara@example.com'
                }
            ];
        },
        sortBy(key) {
            if (this.sortKey === key) {
                this.sortAsc = !this.sortAsc;
            } else {
                this.sortKey = key;
                this.sortAsc = true;
            }
            this.currentPage = 1;
        },
        get filteredRecords() {
            let filtered = this.records.filter(record => {
                return record.name.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
                    record.email.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
                    record.id.toString().includes(this.searchTerm);
            });
            return filtered.sort((a, b) => {
                let modifier = this.sortAsc ? 1 : -1;
                if (a[this.sortKey] < b[this.sortKey]) return -1 * modifier;
                if (a[this.sortKey] > b[this.sortKey]) return 1 * modifier;
                return 0;
            });
        },
        get totalPages() {
            return Math.ceil(this.filteredRecords.length / this.pageSize);
        },
        get paginatedRecords() {
            let start = (this.currentPage - 1) * this.pageSize;
            return this.filteredRecords.slice(start, start + this.pageSize);
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        }
    }
}
</script>
@endsection