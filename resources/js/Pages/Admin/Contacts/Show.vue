<template>
    <app-layout>
        <template #header>
            Contact Information
            <div class="float-right">

                <a @click="$page.modal = true"
                   class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Note
                </a>

                <Inertia-link :href="route('admin.contacts.edit',{id:contact.id})" v-if="$page.allowed_gates.includes('contacts_process')"
                              class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Edit
                </Inertia-link>

            </div>
        </template>
        <note-modal :display="$page.modal" :data="contact"   :type="'contacts'"  />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">

                        <p class="text-2xl">{{ contact.salutation }} {{ contact.name }} </p>
                        <p class="text-1xl mt-1"> - <b>{{ contact.account ? contact.account.name : ''}}</b></p>


                        <div class="flex mt-6">
                            <p class="text-1xl"><b>Information</b></p>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Contact Owner:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.user.name }}</span></div>
                            <div class="flex-1"><b  class="float-right text-gray-400">Title: </b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.title }}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Email:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.email }}</span></div>
                            <div class="flex-1"><b  class="float-right text-gray-400">Department: </b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.department }}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Phone:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.phone }}</span></div>
                            <div class="flex-1"><b  class="float-right text-gray-400">Home phone: </b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.home_phone }}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Other phone:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.fax }}</span></div>
                            <div class="flex-1"><b  class="float-right text-gray-400">Mobile: </b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.date_of_birth }}</span></div>
                        </div>

                        <div class="flex mt-5">
                            <div class="flex-1 w-40"><b class="float-right text-gray-400">Assistant:</b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.assistant }}</span></div>
                            <div class="flex-1"><b  class="float-right text-gray-400">Assistant phone: </b></div>
                            <div class="flex-1"><span class="ml-5">{{ contact.assistant_phone }}</span></div>
                        </div>

                        <div class=" mt-5">
                            <p class="text-1xl"><b>Notes:</b> (<span class="text-sm">{{contact.notes.length}}</span>) </p>
                            <div v-for="note in contact.notes" v-if="contact.notes.length > 0" class="flex mt-3">
                                <div class="flex-1 w-1/3 bg-white px-4 py-4 rounded ml-15  shadow  ">
                                    <div v-if="note.user_id == $page.user.id">
                                        <div class="float-right" >
                                            <Inertia-link  :preserve-scroll="true" :preserve-state="true" method="DELETE" :href="route('admin.notes.destroy',{id:note.id})" class="focus:outline-none hover:text-red-500">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </Inertia-link>
                                        </div>
                                        <br clear="all"/>
                                    </div>

                                    <div class="float-left flex">
                                        <div class="flex align-middle mt-3" >
                                            <img :src="note.user.profile_photo_url" class="h-8 w-8 rounded-full object-cover"/>
                                            <div class="align-middle mt-2.5 ml-2 text-sm">{{note.user.name}}</div>
                                        </div>
                                    </div>
                                    <div class="float-right md:text-xs ">{{note.date}}</div>
                                    <br clear="all"/>
                                    <div class="mt-5">
                                        <h4><b class="text-sm">{{note.title}}</b></h4>
                                        <p class="mt-2 text-justify text-xs">{{note.note}}</p>
                                    </div>
                                </div>
                                <div class="flex-1"></div>
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
import NoteModal from '@/Shared/NoteModal';


export default {
    props:['contact'],
    components: { AppLayout,NoteModal},


}
</script>
