<template>

    <transition name="fade" appear mode="out-in">
        <div>

            <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50   justify-center items-center flex"
                 v-if="showModal">
                <div class="relative w-1/1 my-6 mx-auto  w-4xl">
                    <!--content-->
                    <div
                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <!--header-->
                        <div
                            class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t bg-teal-900 text-white">
                            <h3 class="text-3xl font-semibold">
                                Notes for - <small>{{ data.name }}</small>
                            </h3>
                            <button
                                class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                v-on:click="toggleModal()">
              <span class="bg-transparent  opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none text-white">
                ×
              </span>
                            </button>
                        </div>
                        <!--body-->
                        <form @submit.prevent="submitForm">
                            <div class="relative p-6 flex-auto">

                                <div class="float-right">
                                    <label for="date">Date</label>
                                    <br clear="all"/>
                                    <input type="date" class="form-input mt-2" id="date" v-model="form.date" required/>
                                </div>
                                <br clear="all"/>
                                <div class="mt-5">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-input w-full mt-2" id="title" v-model="form.title"/>
                                </div>

                                <div class="mt-5">
                                    <label for="note">Note</label>
                                    <textarea class="form-textarea w-full mt-2" id="note" v-model="form.note"/>
                                </div>

                            </div>
                            <!--footer-->
                            <div
                                class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                                <button
                                    class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1"
                                    type="button" style="transition: all .15s ease" v-on:click="toggleModal()">
                                    Close
                                </button>
                                <button
                                    class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                    style="transition: all .15s ease">
                                    Save Note
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
        </div>
    </transition>
</template>


<script>
import Input from "@/Jetstream/Input";

export default {
    components: {Input},
    props: ['display', 'data','type'],
    name: "regular-modal",
    data() {
        return {
            showModal: false,
            form: this.$inertia.form({
                passId:this.data.id,
                date: null,
                title: null,
                note: null,
                type:this.type
            }),
        }
    },
    watch: {
        display: {
            immediate: true,
            handler() {
                if (this.display) this.showModal = true;
            }
        }
    },
    methods: {
        toggleModal: function () {
            this.$page.modal = this.showModal = false;
        },
        submitForm() {
            this.$inertia.visit( '/admin/notes/',{
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
<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
{
    opacity: 0;
}
</style>
