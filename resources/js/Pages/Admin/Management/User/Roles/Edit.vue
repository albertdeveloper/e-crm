<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles > Create
            </h2>
        </template>


        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  md:h-ful shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submitForm">

                            <label class="block">
                                <div class="float-right" v-if="form.error('title')">{{ form.error('title') }}</div>
                                <span class="text-gray-700">Title</span>
                                <input class="form-input mt-1 block w-full" placeholder="" v-model="form.title">
                            </label>

                            <label class="block mt-3">
                                <div class="float-right" v-if="form.error('permissions')">{{ form.error('permissions')
                                    }}
                                </div>
                                <div>
                                    <label class="typo__label">Permissions</label>
                                    <multiselect v-model="value" :options="options" :multiple="true"
                                                 placeholder="Type to search" track-by="id" label="title"><span
                                        slot="noResult">Oops! No elements found. Consider changing the search query.</span>
                                    </multiselect>
                                </div>
                            </label>
                            <div class="mt-3">
                                <button type="submit"
                                        class="btn-primary transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-teal-700 hover:bg-teal-900 text-white font-normal py-2 px-4 mr-1 rounded">
                                    Update Role
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
import Multiselect from 'vue-multiselect'

export default {
    props: ['permissions', 'role', 'attach_permission'],
    components: {AppLayout, Multiselect},
    data() {
        return {
            value: [],
            options: [],
            form: this.$inertia.form({
                id: this.role.id,
                title: this.role.title,
                permissions: '',
            })
        }
    },
    mounted() {
        this.mapPermissions();
    },
    methods: {
        mapPermissions()
        {
            this.permissions.map(perm => {
                this.options.push({title: perm.title, id: perm.id},);
            })

            this.attach_permission.map(perm => {
                this.value.push({title: perm.title, id: perm.id});
            });

        },
        submitForm() {
            this.form.permissions = this.value;
            this.form.put('/admin/roles/' + this.role.id, {
                preserveScroll: true,
            }).then(() => {
                this.form.reset()
            })
        },

        addTag(newTag) {
            const tag = {
                title: newTag,
                id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.options.push(tag)
            this.value.push(tag)
        }
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
