<template>
    <app-layout>
        <template #header>
            Create Account

            <div class="float-right">
                <Inertia-link :href="route('admin.leads.index')"
                              class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Cancel
                </Inertia-link>

                <a @click.prevent="submitForm" v-if="$page.allowed_gates.includes('accounts_process')"
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
                                    <div class="float-right" v-if="form.error('name')">{{ form.error('name') }}</div>
                                    <span class="text-gray-700">Account name</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.name">
                                </label>
                                <div class="flex-1"></div>
                            </div>

                            <div class="flex ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('owner')">{{ form.error('owner') }}</div>
                                    <span class="text-gray-700">Account owner</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.owner">
                                </label>
                                <div class="flex-1"></div>
                            </div>

                            <div class="flex mt-5 ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('industry')">{{ form.error('industry') }}</div>
                                    <span class="text-gray-700">Industry</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.industry">
                                </label>
                                <div class="flex-1"></div>
                            </div>

                            <div class="flex mt-5 ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('no_employee')">{{ form.error('no_employee') }}</div>
                                    <span class="text-gray-700">No. of Employee</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.no_employee">
                                </label>
                                <div class="flex-1"></div>
                            </div>

                            <div class="flex mt-5 ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('annual_revenue')">{{ form.error('annual_revenue') }}</div>
                                    <span class="text-gray-700">Annual Revenue</span>
                                    <input class="form-input mt-1 block w-full" type="number" v-model="form.annual_revenue">
                                </label>
                                <div class="flex-1"></div>
                            </div>

                            <div class="flex mt-5 ">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('phone')">{{ form.error('phone') }}</div>
                                    <span class="text-gray-700">Phone</span>
                                    <input class="form-input mt-1 block w-full"  v-model="form.phone">
                                </label>
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
    props:['account_data'],
    data() {
        return {
            form:this.$inertia.form({
                id: this.account_data.id,
                name: this.account_data.name,
                owner: this.account_data.owner,
                industry: this.account_data.industry,
                no_employee: this.account_data.no_employee,
                annual_revenue: this.account_data.annual_revenue,
                phone: this.account_data.phone,
            })
        }
    },
    components: {AppLayout},
    methods: {
        submitForm() {
            this.$inertia.visit( '/admin/accounts/'+this.form.id,{
                method: 'PUT',
                data:this.form,
                onSuccess: () => {

                },
            })
        }
    }
}
</script>
