<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lead Information
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">

                        <p class="text-2xl">{{ lead_data.salutation }} {{ lead_data.first_name }}
                            {{ lead_data.last_name }}</p>
                        <p class="text-1xl"> - {{ lead_data.company }}</p>


                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b class="float-right text-gray-400">Lead Owner:</b></div>
                            <div class="flex-initial"><span class="ml-5">{{ lead_data.owner }}</span></div>
                        </div>
                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b class="float-right text-gray-400">Email:</b></div>
                            <div class="flex-initial"><span class="ml-5">{{ lead_data.email }}</span></div>

                        </div>
                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b class="float-right text-gray-400">Phone:</b></div>
                            <div class="flex-initial"><span class="ml-5">{{ lead_data.phone }}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b class="float-right text-gray-400">Mobile:</b></div>
                            <div class="flex-initial"><span class="ml-5">{{ lead_data.mobile }}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b class="float-right text-gray-400">Lead Status:</b></div>
                            <div class="flex-initial"><span class="ml-5">{{ lead_data.owner }}</span></div>
                        </div>


                        <div class="flex mt-5">
                            <p class="text-2xl">Lead Information</p>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b class="float-right text-gray-400">Lead Owner:</b></div>
                            <div class="flex-initial"><span class="ml-5">{{ lead_data.owner }}</span></div>
                            <div class="flex-initial w-40"><b class="float-right text-gray-400">Company:</b></div>
                            <div class="flex-initial"><span class="ml-5">{{ lead_data.company }}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b class="float-right text-gray-400">Title:</b></div>
                            <div class="flex-initial"><span class="ml-5">{{ lead_data.title }}</span></div>
                            <div class="flex-initial w-40"><b class="float-right text-gray-400">Lead Name:</b></div>
                            <div class="flex-initial"><span class="ml-5">{{ lead_data.company }}</span></div>
                        </div>



                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b  class="float-right text-gray-400">Phone:</b> </div>
                            <div class="flex-initial"> <span class="ml-5">{{lead_data.phone}}</span></div>

                            <div class="flex-initial w-40"><b  class="float-right text-gray-400">Email:</b> </div>
                            <div class="flex-initial"> <span class="ml-5">{{lead_data.email}}</span></div>
                        </div>


                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b  class="float-right text-gray-400">Mobile:</b> </div>
                            <div class="flex-initial"> <span class="ml-5">{{lead_data.mobile}}</span></div>

                            <div class="flex-initial w-40"><b  class="float-right text-gray-400">Fax:</b> </div>
                            <div class="flex-initial"> <span class="ml-5">{{lead_data.fax}}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b  class="float-right text-gray-400">Lead Source:</b> </div>
                            <div class="flex-initial"> <span class="ml-5">{{lead_data.owner}}</span></div>

                            <div class="flex-initial w-40"><b  class="float-right text-gray-400">Lead Status:</b> </div>
                            <div class="flex-initial"> <span class="ml-5">{{lead_data.owner}}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-initial w-40"></div>
                            <div class="flex-initial w-40"><b  class="float-right text-gray-400">Lead Source:</b> </div>
                            <div class="flex-initial"> <span class="ml-5">{{lead_data.owner}}</span></div>

                            <div class="flex-initial w-40"><b  class="float-right text-gray-400">No. of employee:</b> </div>
                            <div class="flex-initial"> <span class="ml-5">{{lead_data.no_employee}}</span></div>
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
    props: ['lead_data', 'lead_logo'],
    components: {AppLayout},

}
</script>
