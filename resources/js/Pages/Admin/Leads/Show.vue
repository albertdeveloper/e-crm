<template>
    <app-layout>
        <template #header>
            Lead Information
            <div class="float-right">
                <Inertia-link :href="route('admin.leads.convert',{id:lead_data.id})"
                              class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-green-700 hover:bg-green-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Convert
                </Inertia-link>

                <a @click="$page.modal = true"
                              class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Note
                </a>

                <Inertia-link :href="route('admin.leads.edit',{id:lead_data.id})" v-if="$page.allowed_gates.includes('leads_process')"
                              class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Edit
                </Inertia-link>

            </div>
        </template>
         <note-modal :display="$page.modal"  :data="lead_data" :model="'App\\Models\\Lead'"  />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">

                        <p class="text-2xl">{{ lead_data.salutation }} {{ lead_data.first_name }}
                            {{ lead_data.last_name }}</p>
                        <p class="text-1xl"> - {{ lead_data.company }}</p>

                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Lead Owner:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.user.name }}</span></div>
                            <div class="flex-1"></div>
                            <div class="flex-1"></div>
                        </div>
                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Email:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.email }}</span></div>
                            <div class="flex-1"></div>
                            <div class="flex-1"></div>

                        </div>
                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Phone:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.phone }}</span></div>
                            <div class="flex-1"></div>
                            <div class="flex-1"></div>

                        </div>

                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Mobile:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.mobile }}</span></div>
                            <div class="flex-1"></div>
                            <div class="flex-1"></div>
                        </div>

                        <div class="flex mt-5">

                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Lead Status:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.owner }}</span></div>
                            <div class="flex-1"></div>
                            <div class="flex-1"></div>
                        </div>


                        <div class="flex mt-5">
                            <p class="text-2xl">Lead Information</p>
                        </div>

                        <div class="flex mt-5">

                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Lead Owner:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.owner }}</span></div>
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Company:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.company }}</span></div>
                        </div>

                        <div class="flex mt-5">

                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Title:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.title }}</span></div>
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Lead Name:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.company }}</span></div>
                        </div>

                        <div class="flex mt-5">

                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Phone:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.phone }}</span></div>

                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Email:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.email }}</span></div>
                        </div>

                        <div class="flex mt-5">

                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Mobile:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.mobile }}</span></div>

                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Fax:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.fax }}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Lead Source:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.owner }}</span></div>
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Lead Status:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.owner }}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Lead Source:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.owner }}</span></div>
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">No. of employee:</b>
                            </div>
                            <div class="flex-1"><span class="ml-5">{{ lead_data.no_employee }}</span></div>
                        </div>


                        <div class="flex mt-5">
                            <p class="text-2xl">Notes: </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import NoteModal from '@/Shared/NoteModal';


export default {
    props: ['lead_data', 'lead_logo'],
    components: { AppLayout,NoteModal},


}
</script>
