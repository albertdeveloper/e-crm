<template>
    <app-layout>
        <template #header>
            Create Lead

            <div class="float-right">
                <Inertia-link :href="route('admin.leads.index')"
                              class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-white shadow text-black text-white font-normal py-2 px-4 mr-1 rounded">
                    Cancel
                </Inertia-link>

                <a @click.prevent="submitForm" v-if="$page.allowed_gates.includes('leads_process')"
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
                                <h2 class="text-2xl font-bold">Lead Information</h2>
                            </div>

                            <div class="flex ">
                                <div class="flex-1"></div>

                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('owner_id')">{{
                                            form.error('owner_id')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Lead Owner</span>
                                    <select class="form-input  mt-1 block w-full" v-model="form.owner_id">
                                        <option></option>
                                        <option v-for="leadOwner in lead_owners" :value="leadOwner.id">
                                            {{ leadOwner.name }}
                                        </option>
                                    </select>
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('company')">{{
                                            form.error('company')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Company</span>
                                    <input class="form-input mt-1 border-r-red block w-full"
                                           v-model="form.company">
                                </label>
                            </div>

                            <div class="flex mt-2">
                                <div class="flex-1"></div>

                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('company')">{{
                                            form.error('company')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Company Owner</span>
                                    <input class="form-input mt-1 border-r-red block w-full"
                                           v-model="form.company_owner">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('company')">{{
                                            form.error('company')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Company</span>
                                    <input class="form-input mt-1 border-r-red block w-full"
                                           v-model="form.company">
                                </label>
                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>

                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block   flex-1">
                                    <div class="float-right" v-if="form.error('first_name')">{{
                                            form.error('first_name')
                                        }}
                                    </div>

                                    <span class="text-gray-700">First Name</span>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center">
                                            <select id="salutation" v-model="form.salutation" name="salutation"
                                                    class="focus:ring-indigo-500  h-full py-0 pl-1 pr-3 border-transparent bg-transparent   rounded-md">
                                                <option></option>
                                                <option>Mr.</option>
                                                <option>Mrs.</option>
                                                <option>Ms.</option>
                                                <option>Dr.</option>
                                                <option>Prof.</option>
                                            </select>
                                        </div>
                                        <input type="text" name="first_name" id="first_name"
                                               class="form-input focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-20 pr-20  border-gray-300 rounded-md block w-full "
                                               v-model="form.first_name"/>
                                    </div>
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('last_name')">{{
                                            form.error('last_name')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Last Name</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.last_name">
                                </label>
                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('title')">{{ form.error('title') }}</div>
                                    <span class="text-gray-700">Title</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.title">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('email')">{{ form.error('email') }}</div>
                                    <span class="text-gray-700">Email</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.email">
                                </label>
                            </div>


                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('phone')">{{ form.error('phone') }}</div>
                                    <span class="text-gray-700">Phone</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.phone">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('fax')">{{ form.error('fax') }}</div>
                                    <span class="text-gray-700">Fax</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.fax">
                                </label>
                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('mobile')">{{
                                            form.error('mobile')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Mobile</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.mobile">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('website')">{{
                                            form.error('website')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Website</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.website">
                                </label>
                            </div>


                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('lead_source')">
                                        {{ form.error('lead_source') }}
                                    </div>
                                    <span class="text-gray-700">Lead Source</span>
                                    <select class="form-input mt-1 block w-full" v-model="form.lead_source">
                                        <option></option>
                                        <option v-for="source in lead_sources" :value="source.id">
                                            {{ source.title }}
                                        </option>
                                    </select>
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('lead_status')">
                                        {{ form.error('lead_status') }}
                                    </div>
                                    <span class="text-gray-700">Lead Status</span>
                                    <select class="form-input mt-1 block w-full" v-model="form.lead_status">
                                        <option></option>
                                        <option v-for="status in lead_status" :value="status.id">
                                            {{ status.title }}
                                        </option>
                                    </select>
                                </label>
                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('industry')">{{
                                            form.error('industry')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Industry</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.industry">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('no_employees')">
                                        {{ form.error('no_employee') }}
                                    </div>
                                    <span class="text-gray-700">No. of Employees</span>
                                    <input class="form-input mt-1 block w-full" type="number"
                                           v-model="form.no_employee">
                                </label>
                            </div>


                            <div class="flex py-3 px-3 ">
                                <h2 class="text-2xl font-bold">Address Information</h2>
                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('street')">{{
                                            form.error('street')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Street</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.street">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('city')">
                                        {{ form.error('city') }}
                                    </div>
                                    <span class="text-gray-700">City</span>
                                    <input class="form-input mt-1 block w-full"
                                           v-model="form.city">
                                </label>
                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('state')">{{
                                            form.error('state')
                                        }}
                                    </div>
                                    <span class="text-gray-700">State</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.state">
                                </label>
                                <label class="block ml-5 flex-1">
                                    <div class="float-right" v-if="form.error('zip_code')">
                                        {{ form.error('zip_code') }}
                                    </div>
                                    <span class="text-gray-700">Zip Code</span>
                                    <input class="form-input mt-1 block w-full"
                                           v-model="form.zip_code">
                                </label>
                            </div>


                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <div class="float-right" v-if="form.error('country')">{{
                                            form.error('country')
                                        }}
                                    </div>
                                    <span class="text-gray-700">Country</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.country">
                                </label>
                                <label class="block ml-5 flex-1">

                                </label>
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
    props: ['lead_sources', 'lead_status', 'lead_owners'],
    components: {AppLayout},
    data() {
        return {
            form: this.$inertia.form({
                owner_id: this.$page.user.id,
                company_owner: null,
                company: null,
                salutation: null,
                first_name: null,
                last_name: null,
                title: null,
                email: null,
                phone: null,
                fax: null,
                mobile: null,
                website: null,
                lead_source: null,
                lead_status: null,
                industry: null,
                no_employee: null,
                street: null,
                city: null,
                state: null,
                zip_code: null,
                country: null,

            })
        }
    },
    methods: {
        submitForm() {
            this.$inertia.visit('/admin/leads', {
                method: 'POST',
                data: this.form,
                preserveScroll: true,
                preserveState: true,
                onSuccess: () => {

                },
            })

        }
    }
}
</script>
