<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <Inertia-Link
                            class="button-primary bg-teal-700 hover:bg-teal-900 px-3 py-3  text-white shadow-lg rounded"
                            :href="route('admin.roles.create')">New Roles
                        </Inertia-Link>


                        <div class="mt-6 bg-white rounded shadow " v-if="roles.length > 0">
                            <table class="table-fixed">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="px-6 pt-6 w-1/4 pb-4">Title</th>
                                    <th class="px-6 pt-6 w-1/2 pb-4">Permissions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="role in roles"
                                    class="hover:bg-gray-100 focus-within:bg-gray-100" style="cursor: pointer"
                                    @click="update(role.id)">
                                    <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                        <Inertia-Link :href="route('admin.roles.edit',{id: role.id})">
                                            {{ role.title }}
                                        </Inertia-Link>
                                    </td>

                                    <td class="border-t">
                                        <Inertia-Link :href="route('admin.roles.edit',{id: role.id})">
                                            <button
                                                class="rounded btn primary px-1 py-1 bg-blue-500 hover:bg-blue-700 text-white mr-1 mt-1 mb-1"
                                                v-for="permission in role.permissions">
                                                {{ permission.title }}
                                            </button>
                                        </Inertia-Link>
                                    </td>

                                    <td class="border-t w-px">
                                        <Inertia-Link :href="route('admin.roles.edit',{id: role.id})">
                                            <icon name="cheveron-right"
                                                  class="block w-6 h-6 fill-gray-400 float-right"/>
                                        </Inertia-Link>
                                    </td>
                                </tr>
                                </tbody>

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
import Button from "@/Jetstream/Button";

export default {
    props: ['roles'],
    components: {Button, Icon, AppLayout},
    data() {
        return {
            update(id)
            {
                window.location="/admin/roles/"+id+"/edit";
            }
        }
    }
}
</script>
