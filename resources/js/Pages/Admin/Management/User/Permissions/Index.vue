<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permissions
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <Inertia-Link class="button-primary bg-teal-700 hover:bg-teal-900 px-3 py-3  text-white shadow-lg rounded" v-if="$page.allowed_gates.includes('permissions_process')"
                                      :href="route('admin.permissions.create')">New Permission
                        </Inertia-Link>
                        <div class="mt-6 bg-white rounded shadow overflow-x-auto" v-if="permissions.length > 0">
                            <table class="w-full whitespace-no-wrap">
                                <tr class="text-left font-bold">
                                    <th class="px-6 pt-6 pb-4">Title</th>
                                </tr>
                                <tr v-for="permission in permissions"
                                    class="hover:bg-gray-100 focus-within:bg-gray-100 cursor-pointer">
                                    <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                        <Inertia-Link :href="route('admin.permissions.edit',{id: permission.id})">
                                            {{ permission.title }}
                                        </Inertia-Link>
                                     </td>
                                    <td class="border-t w-px">
                                        <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                                    </td>
                                </tr>
                            </table>
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
import Icon from "@/Shared/Icon";

export default {
    props: ['permissions'],
    components: {Icon, AppLayout},
    data() {
        return {
            form: this.$inertia.form({
                id: null,
                title: null,
            }),
        }
    }

}
</script>
