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
                        <Inertia-Link
                            class="button-primary bg-teal-700 hover:bg-teal-900 px-3 py-3  text-white shadow-lg rounded"
                            :href="route('admin.leads.create')"> + New Leads
                        </Inertia-Link>
                        <div class="mt-6 bg-white rounded shadow overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <tr class="text-left font-bold">
                                    <th class="px-6 pt-6 pb-4">LEAD NAME</th>

                                    <th class="px-6 pt-6 pb-4">COMPANY</th>

                                    <th class="px-6 pt-6 pb-4">EMAIL</th>

                                    <th class="px-6 pt-6 pb-4">PHONE</th>

                                    <th class="px-6 pt-6 pb-4">LEAD SOURCE</th>

                                    <th class="px-6 pt-6 pb-4">LEAD OWNER</th>
                                </tr>
                            </table>
                        </div>
                        <div class="mt-6 bg-white rounded shadow overflow-x-auto px-3 py-3">
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

export default {
    components: {AppLayout}
}
</script>
