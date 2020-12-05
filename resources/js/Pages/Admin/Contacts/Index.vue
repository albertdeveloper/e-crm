<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 contacting-tight">
                Contacts
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <Inertia-link :href="route('admin.contacts.create')"  v-if="$page.allowed_gates.includes('contacts_process')"
                                      class="btn btn-primary px-3 py-3 bg-teal-700 hover:bg-teal-900 rounded text-white float-right">
                            + New Contacts
                        </Inertia-link>
                        <Search :filters="filters" :routeUrl="route('admin.contacts.index')"/>

                        <div class="mt-6 bg-white rounded " v-if="contacts.data.length > 0">
                            <div class=" shadow overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <tr class="text-left font-bold">
                                    <th class="px-6 pt-6 pb-4">CONTACT NAME</th>
                                    <th class="px-6 pt-6 pb-4">ACCOUNT NAME</th>
                                    <th class="px-6 pt-6 pb-4">EMAIL</th>
                                    <th class="px-6 pt-6 pb-4">PHONE</th>
                                    <th class="px-6 pt-6 pb-4">CONTACT OWNER</th>
                                </tr>

                                <tr v-for="contact in contacts.data" :key="contact.id"
                                    class="hover:bg-gray-100 focus-within:bg-gray-100 cursor-pointer">
                                    <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                        <Inertia-link :href="route('admin.contacts.edit',{id:contact.id})"
                                                      >
                                            {{ contact.name }}
                                        </Inertia-link>
                                    </td>
                                    <td class="px-6 py-4     focus:text-indigo-500 border-t">
                                        <Inertia-link :href="route('admin.accounts.show',{id:contact.id})"
                                                      class="text-blue-500">
                                            {{ contact.account.name }}
                                        </Inertia-link>

                                    </td>
                                    <td class="px-6 py-4   focus:text-indigo-500 border-t">
                                        <Inertia-link :href="route('admin.contacts.edit',{id:contact.id})"
                                                      >
                                            {{contact.email}}
                                        </Inertia-link>

                                    </td>
                                    <td class="px-6 py-4  focus:text-indigo-500 border-t">
                                        <Inertia-link :href="route('admin.contacts.edit',{id:contact.id})"
                                                      >
                                            {{contact.phone}}
                                        </Inertia-link>

                                    </td>
                                    <td class="px-6 py-4   focus:text-indigo-500 border-t">
                                        <Inertia-link :href="route('admin.contacts.edit',{id:contact.id})"
                                                      >
                                            {{ contact.owner }}
                                        </Inertia-link>
                                    </td>
                                </tr>
                            </table>
                            </div>
                            <pagination :links="contacts.links" />
                        </div>

                        <div class="mt-6 bg-white rounded shadow overflow-x-auto px-3 py-3" v-else>
                            No record found
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Pagination from "@/Shared/Pagination";
import Search from "@/Pages/Filters/Search";

export default {
    props: ['contacts','filters'],
    components: {Search, Pagination, AppLayout}
}
</script>
