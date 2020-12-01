<template>
    <app-layout>
        <template #header>
            Create Account

            <div class="float-right">
                <Inertia-link :href="route('admin.leads.index')"
                              class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Cancel
                </Inertia-link>

                <a @click.prevent="submitForm"
                   class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Save and New
                </a>

                <a @click.prevent="submitForm"
                   class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Save
                </a>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form>
                            <div class="flex py-3 px-3 ">
                                <h2 class="text-2xl font-bold">Account Information</h2>
                            </div>
                            <div class="flex ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('account')">{{ form.error('account') }}</div>
                                    <span class="text-gray-700">Lead Owner</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.account">
                                </label>
                                <div class="flex-1"></div>
                                <div class="flex-1"></div>
                            </div>
                            <div class="flex mt-5 ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('industry')">{{ form.error('industry') }}</div>
                                    <span class="text-gray-700">Lead Owner</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.industry">
                                </label>
                                <div class="flex-1"></div>
                                <div class="flex-1"></div>
                            </div>

                            <div class="flex mt-5 ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('no_employee')">{{ form.error('no_employee') }}</div>
                                    <span class="text-gray-700">Lead Owner</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.no_employee">
                                </label>
                                <div class="flex-1"></div>
                                <div class="flex-1"></div>
                            </div>

                            <div class="flex mt-5 ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('annual_revenue')">{{ form.error('annual_revenue') }}</div>
                                    <span class="text-gray-700">Lead Owner</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.annual_revenue">
                                </label>
                                <div class="flex-1"></div>
                                <div class="flex-1"></div>
                            </div>

                            <div class="flex mt-5 ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('phone')">{{ form.error('phone') }}</div>
                                    <span class="text-gray-700">Lead Owner</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.phone">
                                </label>
                                <div class="flex-1"></div>
                                <div class="flex-1"></div>
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
    data() {
        return {
            form:this.$inertia.form({
                account: null,
                industry: null,
                no_employee: null,
                annual_revenue: null,
                phone: null,
            })
        }
    },
    components: {AppLayout},
    methods: {
        submitForm() {

        }
    }
}
</script>
