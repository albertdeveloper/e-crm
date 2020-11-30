<template>
     <app-layout>
         <template #header>
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 Contacts
             </h2>
         </template>
         <div class="py-12">
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                     <div class="p-6">
                         <Inertia-link :href="route('admin.contacts.create')" class="btn btn-primary px-3 py-3 bg-teal-700 hover:bg-teal-900 rounded text-white">
                             New Contacts
                         </Inertia-link>
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
