<template>
    <app-layout>
        <template #header>
            Contact Information
            <div class="float-right">

                <a @click="$page.modal = true"
                   class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Note
                </a>

                <Inertia-link :href="route('admin.contacts.edit',{id:contact_data.id})" v-if="$page.allowed_gates.includes('contacts_process')"
                              class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Edit
                </Inertia-link>

            </div>
        </template>
        <note-modal :display="$page.modal" :data="contact_data"   :type="'contacts'"  />

    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import NoteModal from '@/Shared/NoteModal';


export default {
    props:['contact_data'],
    components: { AppLayout,NoteModal},


}
</script>
