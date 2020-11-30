<template>
    <app-layout>
        <template #header>
            Convert Lead ( <span class="text-1xl text-gray-400">{{ lead_data.first_name }} {{ lead_data.last_name }} - {{ lead_data.company }}</span>)
        </template>
        <div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex">
                                <div class="flex-1">
                                    Create New Account:  <b>{{ lead_data.company }}</b>
                                </div>

                            </div>

                            <div class="flex mt-5">
                                <div class="flex-1">
                                    Create New Contact: <b>{{ lead_data.first_name }} {{ lead_data.last_name }}</b>
                                </div>
                            </div>

                            <br clear="all"/>
                            <br clear="all"/>
                            <br clear="all"/>

                            <div class="flex mt-5">
                                <div class="flex-1">
                                    Onwer of the new Record:<br />
                                    <b>{{lead_data.owner}}</b>
                                </div>
                            </div>


                            <div class="flex mt-5">
                                <div class="flex-1">
                                   <button class="btn btn-primary px-3 py-3 bg-teal-700 hover:bg-teal-900 text-white">
                                       Convert
                                   </button>

                                    <Inertia-link :href="route('admin.leads.show',{id:lead_data.id})" class="btn btn-primary px-3 py-3 bg-gray-400 hover:bg-gray-900 text-white">
                                        Cancel
                                    </Inertia-link>

                                </div>
                            </div>


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
    props: ['lead_data'],
    components: {AppLayout}
}
</script>
