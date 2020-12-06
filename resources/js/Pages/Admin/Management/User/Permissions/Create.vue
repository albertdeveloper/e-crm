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
                        <form @submit.prevent="submitForm">
                            <label class="block">
                                <div class="float-right" v-if="form.error('title')">{{ form.error('title') }}</div>
                                <span class="text-gray-700">Title</span>
                                <input class="form-input mt-1 block w-full" placeholder="" v-model="form.title">
                            </label>

                            <div class="mt-3">

                                <button type="submit"
                                        class="btn-primary transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                                    Create Permission
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
    components: {AppLayout},
    data() {
        return {
            form: this.$inertia.form({
                title: null,
            }),
        }
    },
    methods: {
        submitForm() {
            this.$inertia.visit( '/admin/permissions/',{
                method: 'POST',
                data:this.form,
                preserveScroll: true,
                preserveState: true,
                onSuccess: () => {

                },
            })

        }
    }

}
</script>
