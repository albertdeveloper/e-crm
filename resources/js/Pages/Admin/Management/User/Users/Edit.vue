<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users > Update
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submitForm">
                            <label class="block">
                                <div class="float-right" v-if="form.error('name')">{{ form.error('name') }}</div>
                                <span class="text-gray-700">Name</span>
                                <input class="form-input mt-1 block w-full" placeholder="" v-model="form.name">
                            </label>

                            <label class="block mt-3">
                                <div class="float-right" v-if="form.error('email')">{{ form.error('email') }}</div>
                                <span class="text-gray-700">Email</span>
                                <input class="form-input mt-1 block w-full" placeholder="" v-model="form.email">
                            </label>

                            <label class="block mt-3">
                                <div class="float-right" v-if="form.error('email')">{{ form.error('password') }}</div>
                                <span class="text-gray-700">Password</span>
                                <input class="form-input mt-1 block w-full" type="password" placeholder=""
                                       v-model="form.password">
                            </label>

                            <label class="block mt-3">
                                <div class="float-right" v-if="form.error('role')">{{ form.error('role') }}</div>
                                <span class="text-gray-700">Role</span>
                                <select class="form-input mt-1 block w-full" v-model="form.role">
                                    <option></option>
                                    <option v-for="role in roles" :key="role.id" :value="role.id"
                                            :selected="role.id == form.role">
                                        {{ role.title }}
                                    </option>
                                </select>
                            </label>
                            <div class="mt-3">
                                <button type="submit"
                                        class="btn-primary transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                                    Create User
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
    props: ['user_data', 'roles'],
    components: {AppLayout},
    data() {
        return {
            form: this.$inertia.form({
                id: this.user_data.id,
                name: this.user_data.name,
                email: this.user_data.email,
                role: this.user_data.roles[0] ? this.user_data.roles[0].id : null,
                password: null
            }),
        }
    },
    methods: {
        submitForm() {
            this.form.put('/admin/users/' + this.user_data.id, {
                preserveScroll: true
            }).then(() => {
                this.form.reset();
            })
        }
    }

}
</script>
