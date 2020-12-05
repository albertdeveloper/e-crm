<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 contacting-tight">
                Account's
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <Inertia-link :href="route('admin.accounts.create')" v-if="$page.user.allowed_gates.includes('accounts_process')"
                                      class="btn float-right btn-primary px-3 py-3 bg-teal-700 hover:bg-teal-900 rounded text-white">
                            + New Accounts
                        </Inertia-link>
                        <Search :filters="filters" :routeUrl="route('admin.accounts.index')"/>

                        <div class="mt-6 bg-white rounded" v-if="accounts.data.length > 0">
                        <div class="shadow overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <tr class="text-left font-bold">
                                <th class="px-6 pt-6 pb-4">ACCOUNT NAME</th>
                                <th class="px-6 pt-6 pb-4">ACCOUNT OWNER</th>
                                <th class="px-6 pt-6 pb-4">INDUSTRY</th>
                                <th class="px-6 pt-6 pb-4">PHONE</th>

                            </tr>

                            <tr v-for="account in accounts.data" :key="account.id"
                                class="hover:bg-gray-100 focus-within:bg-gray-100 cursor-pointer">
                                <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                    <Inertia-link :href="route('admin.accounts.edit',{id:account.id})"
                                                  class="text-blue-500">
                                         {{account.name}}
                                    </Inertia-link>
                                </td>
                                <td class="px-6 py-4     focus:text-indigo-500 border-t">
                                    <Inertia-link :href="route('admin.accounts.show',{id:account.id})"
                                                   >
                                        {{ account.owner }}
                                    </Inertia-link>
                                </td>

                                <td class="px-6 py-4     focus:text-indigo-500 border-t">
                                    <Inertia-link :href="route('admin.accounts.show',{id:account.id})"
                                                   >
                                        {{ account.industry }}
                                    </Inertia-link>
                                </td>

                                <td class="px-6 py-4     focus:text-indigo-500 border-t">
                                    <Inertia-link :href="route('admin.accounts.show',{id:account.id})"
                                                  >
                                        {{ account.phone }}
                                    </Inertia-link>
                                </td>
                            </tr>
                        </table>
                        </div>

                        <pagination :links="accounts.links" />

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
    props:['accounts','filters'],
    components: {Search, Pagination, AppLayout}
}
</script>
