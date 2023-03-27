<template>
    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                <input
                    type="search"
                    class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:text-neutral-200 dark:placeholder:text-neutral-200"
                    placeholder="Search"
                    aria-label="Search"
                    v-model="searchQuery" />
            </div>
        </div>
    </div>
    <table class="min-w-full text-left text-sm font-light">
        <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-6 py-4">Name</th>
                <th scope="col" class="px-6 py-4">Price</th>
                <th scope="col" class="px-6 py-4">Offices</th>
                <th scope="col" class="px-6 py-4">Tables</th>
                <th scope="col" class="px-6 py-4">SQM</th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="!isLoading && offices.length" v-for="office in offices">
                <td class="whitespace-nowrap px-6 py-4">{{ office.name }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ office.price }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ office.offices }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ office.tables }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ office.sqm }}</td>
            </tr>
            <tr v-if="noResults">
                <td colspan="5" class="text-center">No offices match this criteria.</td>
            </tr>
            <tr v-if="isLoading">
                <td colspan="5" class="text-center"><spinner /></td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            offices: [],
            api_url: '/api/offices',
            searchQuery: null,
            noResults: false,
            isLoading: false
        }
    },
    mounted() {
        this.getResults('');
    },
    watch: {
        searchQuery(searchQuery) {
            this.getResults(searchQuery);
        }
    },
    methods: {
        getResults(searchQuery) {
            this.isLoading = true;

            const request = axios.get(this.api_url + '?query=' + searchQuery);
            request.then(({ data }) => {
                this.isLoading = false;
                this.noResults = false;
                this.offices = data;
            }).catch((err) => {
                this.isLoading = false;
                this.noResults = true;
                this.offices = [];

                window.console.log(this.noResults);
            });
        },
    }
}
</script>
