<template>
    <transition v-if="showModal" name="fade">
        <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50   justify-center items-center flex">
            <div class="relative w-1/2 my-6 mx-auto  w-4xl">
                <!--content-->
                <div
                    class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <!--header-->
                    <div
                        class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t bg-teal-900 text-white">
                        <h3 class="text-3xl font-semibold">
                            Notes
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
                    <div class="relative p-6 flex-auto">
                        <div>
                            <label for="title">Title</label>
                            <input type="text" class="form-input w-full mt-2" id="title"/>
                        </div>

                        <div class="mt-5">
                            <label for="note">Note</label>
                            <textarea class="form-textarea w-full mt-2" id="note"/>
                        </div>

                    </div>
                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                        <button
                            class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition: all .15s ease" v-on:click="toggleModal()">
                            Close
                        </button>
                        <button
                            class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition: all .15s ease" v-on:click="toggleModal()">
                            Save Note
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    </transition>
</template>

<script>
import Input from "@/Jetstream/Input";

export default {
    components: {Input},
    props: ['display'],
    name: "regular-modal",
    data() {
        return {
            showModal: false
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
