<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Leads
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <Inertia-Link v-if="$page.allowed_gates.includes('leads_process')"
                            class="button-primary float-right bg-teal-700 hover:bg-teal-900 px-3 py-3  text-white shadow-lg rounded"
                            :href="route('admin.leads.create')"> + New Leads
                        </Inertia-Link>
                        <Search :filters="filters" :routeUrl="route('admin.leads.index')"/>

                        <div class="mt-6 bg-white rounded" v-if="leads.data.length > 0">
                            <div class="shadow overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <tr class="text-left font-bold">
                                    <th class="px-6 pt-6 pb-4">LEAD NAME</th>

                                    <th class="px-6 pt-6 pb-4">COMPANY</th>

                                    <th class="px-6 pt-6 pb-4">EMAIL</th>

                                    <th class="px-6 pt-6 pb-4">PHONE</th>

                                    <th class="px-6 pt-6 pb-4">LEAD SOURCE</th>

                                </tr>

                                <tr v-for="lead in leads.data" :key="lead.id"
                                    class="hover:bg-gray-100 focus-within:bg-gray-100 cursor-pointer">
                                    <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                        <Inertia-link :href="route('admin.leads.show',{id:lead.id})"
                                                      class="text-blue-500">
                                            {{  lead.name }}
                                        </Inertia-link>
                                    </td>
                                    <td class="border-t">
                                        <Inertia-link :href="route('admin.leads.edit',{id:lead.id})">
                                            {{ lead.company }}
                                        </Inertia-link>
                                    </td>
                                    <td class="border-t">
                                        <Inertia-link :href="route('admin.leads.edit',{id:lead.id})">
                                            {{ lead.email }}
                                        </Inertia-link>
                                    </td>
                                    <td class="border-t">
                                        <Inertia-link :href="route('admin.leads.edit',{id:lead.id})">{{ lead.phone }}
                                        </Inertia-link>
                                    </td>
                                    <td class="border-t">
                                        <Inertia-link :href="route('admin.leads.edit',{id:lead.id})">
                                            {{ lead.lead_status ? lead.lead_status.title : '' }}
                                        </Inertia-link>
                                    </td>

                                </tr>
                            </table>
                            </div>

                            <pagination :links="leads.links" />
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
    props: ['leads','filters'],
    components: {Search, Pagination, AppLayout}
}
</script>
