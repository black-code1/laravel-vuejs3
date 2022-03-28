<template>
    <div class="felx flex-col">
        <div class="flex mb-3">
            <router-link
                :to="{ name: 'customers.create' }"
                class="bg-green-500 px-2 py-1 text-white rounded"
                >Creer un client</router-link
            >
        </div>
        <div class="my-2 overflow-x-auto sm:mx-6 lg:mx-8">
            <div
                class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
            >
                <div
                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                >
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Nom
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Telephone
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Is Favourite ?
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <template
                                v-for="customer in customers"
                                :key="customer.id"
                            >
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10"
                                            >
                                                <img
                                                    src="https://images.unsplash.com/photo-1590373267371-d3f97adaa190?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bWFzayUyMGZhY2V8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60"
                                                    alt=""
                                                    class="h-10 w-10 rounded-full"
                                                />
                                            </div>
                                            <div class="ml-4">
                                                <div
                                                    class="text-sm font-medium text-gray-900"
                                                    v-text="customer.name"
                                                ></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm text-gray-900"
                                            v-text="customer.tel"
                                        ></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                            v-bind:class="{
                                                'bg-green-100 text-green-800':
                                                    customer.is_favourite,
                                            }"
                                            v-text="customer.is_favourite"
                                        >
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                    >
                                        <router-link
                                            :to="{
                                                name: 'customers.edit',
                                                params: { id: customer.id },
                                            }"
                                            class="text-indigo-600 hover:text-indigo-900"
                                            >Editer</router-link
                                        >
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted } from "vue";
import useCustomers from "../services/customerservices.js";

export default {
    setup() {
        const { customers, getCustomers } = useCustomers();

        onMounted(getCustomers());

        return {
            customers,
        };
    },
};
</script>
