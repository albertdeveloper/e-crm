<template>
    <app-layout>
        <template #header>
            Create Contact

            <div class="float-right">
                <Inertia-link :href="route('admin.contacts.index')"
                              class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Cancel
                </Inertia-link>

                <a @click.prevent="submitForm"  v-if="$page.allowed_gates.includes('contacts_process')"
                   class="cursor-pointer btn-primary mb-5 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                    Save and New
                </a>

                <a @click.prevent="submitForm"  v-if="$page.allowed_gates.includes('contacts_process')"
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
                                <h2 class="text-2xl font-bold">Contact Information</h2>
                            </div>
                            <div class="flex ">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <span class="text-gray-700">Lead Owner</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.owner">
                                </label>

                                <label class="block flex-1 ml-2">

                                    <span class="text-gray-700">Lead Source</span>
                                    <select class="form-input mt-1 block w-full focus:ring-indigo-500" v-model="form.lead_source">
                                        <option></option>
                                        <option v-for="source in lead_sources" :value="source.id">
                                            {{ source.title }}
                                        </option>
                                    </select>
                                </label>

                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>

                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block  flex-1">
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
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Prof.">Prof.</option>
                                            </select>
                                        </div>
                                        <input type="text" name="first_name" id="first_name"
                                               class="form-input focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-20 pr-20  border-gray-300 rounded-md block w-full "
                                               v-model="form.first_name"/>
                                    </div>
                                </label>
                                <label class="block ml-2 flex-1">
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
                                    <div class="float-right" v-if="form.error('account_name')">
                                        {{ form.error('account_name') }}
                                    </div>
                                    <span class="text-gray-700">Account Name</span>
                                    <select class="form-input mt-1 block w-full" v-model="form.account_name">
                                        <option></option>
                                        <option v-for="account in account_sources.data" :value="account.id">
                                            {{account.name}}
                                        </option>
                                    </select>
                                </label>

                                <label class="block flex-1 ml-2">
                                    <span class="text-gray-700">Title</span>

                                    <input class="form-input mt-1 block w-full" v-model="form.title">
                                </label>
                            </div>


                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <span class="text-gray-700">Email</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.email">
                                </label>

                                <label class="block flex-1 ml-2">
                                    <span class="text-gray-700">Department</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.department">
                                </label>
                            </div>

                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <span class="text-gray-700">Phone</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.phone">
                                </label>

                                <label class="block flex-1 ml-2">
                                    <span class="text-gray-700">Home Phone</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.home_phone">
                                </label>
                            </div>


                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <span class="text-gray-700">Other Phone</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.other_phone">
                                </label>

                                <label class="block flex-1 ml-2">
                                    <span class="text-gray-700">Fax</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.fax">
                                </label>
                            </div>


                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <span class="text-gray-700">Mobile</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.mobile">
                                </label>

                                <label class="block flex-1 ml-2">
                                    <span class="text-gray-700">Date of Birth</span>
                                    <input class="form-input mt-1 block w-full" type="date"
                                           v-model="form.date_of_birth">
                                </label>
                            </div>


                            <div class="flex mt-3">
                                <div class="flex-1"></div>
                                <label class="block flex-1">
                                    <span class="text-gray-700">Assistant</span>
                                    <input class="form-input mt-1 block w-full" v-model="form.assistant">
                                </label>

                                <label class="block flex-1 ml-2">
                                    <span class="text-gray-700">Assistant Phone</span>
                                    <input class="form-input mt-1 block w-full" type="text"
                                           v-model="form.assistant_phone">
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
    props: ['lead_sources','account_sources','contact_data'],
    data() {
        return {
            form: this.$inertia.form({
                id: this.contact_data.id,
                owner: this.contact_data.owner,
                account_name: this.contact_data.account_id,
                salutation: this.contact_data.salutation,
                lead_source: this.contact_data.lead_source_id,
                first_name: this.contact_data.first_name,
                last_name: this.contact_data.last_name,
                title: this.contact_data.title,
                email: this.contact_data.email,
                department: this.contact_data.department,
                phone: this.contact_data.phone,
                home_phone: this.contact_data.home_phone,
                other_phone: this.contact_data.other_phone,
                fax: this.contact_data.fax,
                mobile: this.contact_data.mobile,
                date_of_birth: this.contact_data.date_of_birth,
                assistant: this.contact_data.assistant,
                assistant_phone: this.contact_data.assistant_phone,
            })
        }
    },
    components: {AppLayout},
    methods: {
        submitForm() {
            this.$inertia.visit( '/admin/contacts/',{
                method: 'POST',
                data:this.form,
                onSuccess: () => {

                },
            })
        }
    }
}
</script>
