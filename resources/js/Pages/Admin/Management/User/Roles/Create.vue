<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles > Create
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submitForm">
                            <label class="block">
                                <div class="float-right" v-if="form.error('title')">{{ form.error('title') }}</div>
                                <span class="text-gray-700">Title</span>
                                <input class="form-input mt-1 block w-full" placeholder="" v-model="form.title">
                            </label>

                            <label class="block mt-3">
                                <div class="float-right" v-if="form.error('permissions')">{{ form.error('permissions') }}</div>
                                <span class="text-gray-700">Permissions</span>
                                <select class="form-select  mt-1 block w-full" multiple v-model="form.permissions">
                                    <option v-for="permission in permissions" :value="permission.id">
                                        {{permission.title}}
                                    </option>
                                </select>
                            </label>
                            <div class="mt-3">

                                <button type="submit"
                                        class="btn-primary transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                                    Create Role
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    props: ['permissions'],
    components: {AppLayout},
    data() {
        return {
            form: this.$inertia.form({
                title: null,
                permissions: [],
            })
        }
    },
    methods: {
        submitForm()
        {
            this.form.post('/admin/roles',{
                preserveScroll:true,
            }).then(() => {
                this.form.reset()
            })
        }
    }
}
</script>
