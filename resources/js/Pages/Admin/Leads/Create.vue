<template>
    <app-layout>
        <template #header>
            Create > Lead
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submitForm">
                            <div class="flex">
                                Lead Information
                            </div>
                            <div class="flex ">
                                <div class="flex-1"></div>
                            <label class="block   flex-1">
                                <div class="float-right" v-if="form.error('owner')">{{ form.error('owner') }}</div>
                                <span class="text-gray-700">Lead Owner</span>
                                <input class="form-input mt-1 block w-full" placeholder="" v-model="form.owner">
                            </label>
                            <label class="block ml-5 flex-1">
                                <div class="float-right" v-if="form.error('company')">{{ form.error('company') }}</div>
                                <span class="text-gray-700">Company</span>
                                <input class="form-input mt-1 block w-full" placeholder="" v-model="form.company">
                            </label>
                            </div>


                            <div class="flex mt-5">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('first_name')">{{ form.error('first_name') }}</div>
                                    <span class="text-gray-700">First Name</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.first_name">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('last_name')">{{ form.error('last_name') }}</div>
                                    <span class="text-gray-700">Last Name</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.last_name">
                                </label>
                            </div>

                            <div class="flex mt-5">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('title')">{{ form.error('title') }}</div>
                                    <span class="text-gray-700">Title</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.title">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('email')">{{ form.error('email') }}</div>
                                    <span class="text-gray-700">Email</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.email">
                                </label>
                            </div>


                            <div class="flex mt-5">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('phone')">{{ form.error('phone') }}</div>
                                    <span class="text-gray-700">Phone</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.phone">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('fax')">{{ form.error('fax') }}</div>
                                    <span class="text-gray-700">Fax</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.fax">
                                </label>
                            </div>

                            <div class="flex mt-5">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('mobile')">{{ form.error('mobile') }}</div>
                                    <span class="text-gray-700">Mobile</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.mobile">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('website')">{{ form.error('website') }}</div>
                                    <span class="text-gray-700">Fax</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.website">
                                </label>
                            </div>


                            <div class="flex mt-5">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('lead_source')">{{ form.error('lead_source') }}</div>
                                    <span class="text-gray-700">Lead Source</span>
                                    <select class="form-input mt-1 block w-full" v-model="form.lead_source">
                                        <option></option>
                                    </select>
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('lead_status')">{{ form.error('lead_status') }}</div>
                                    <span class="text-gray-700">Lead Status</span>
                                    <select class="form-input mt-1 block w-full" v-model="form.lead_status">
                                        <option></option>
                                    </select>
                                </label>
                            </div>

                            <div class="flex mt-5">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('industry')">{{ form.error('industry') }}</div>
                                    <span class="text-gray-700">Industry</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.industry">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('no_employees')">{{ form.error('no_employee') }}</div>
                                    <span class="text-gray-700">No. of Employees</span>
                                    <input class="form-input mt-1 block w-full" placeholder="" v-model="form.no_employee">
                                </label>
                            </div>





                            <div class="mt-3">
                                <button type="submit"
                                        class="btn-primary transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                                    Create Lead
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
                owner:null,
                company:null,
                first_name:null,
                last_name:null,
                title:null,
                email:null,
                phone:null,
                fax:null,
                mobile:null,
                website:null,
                lead_source:null,
                lead_status:null,
                industry:null,
                no_employee:null,
            })
        }
    }
}
</script>
