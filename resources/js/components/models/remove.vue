<template>
<div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg overflow-y-auto z-50">

        <transition name="modal">
            <div class="modal-content text-left">
                <div class="px-4 py-4 flex justify-between items-center pb-3">
                    <h1 class="text-lg font-medium text-doc_text">Supprimer l'enregistrement</h1>
                    <button @click="$emit('close')" type="button" class="focus:outline-none modal-close z-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-6 fill-current text-gray-600">
                            <path
                              d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 11-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 111.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 111.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 010 1.698z" />
                        </svg>
                    </button>
                </div>
                <p class="px-4 py-4 font-semibold text-gray-600 leading-relaxed">{{message}}</p>
                <div class="px-4 py-4 flex justify-end items-center bg-gray-100 rounded-b-lg">
                    <button v-if="!isLoading" @click="$emit('close')" type="button" name="button" class="focus:outline-none mr-6 font-semibold text-gray-700">Cancel</button>
                    <loader v-if="isLoading"></loader>
                    <button v-on:click.prevent="removeRecord" type="button" name="button" class="focus:outline-none bg-red-600 px-6 py-3 rounded font-semibold text-white">Remove</button>
                </div>

            </div>
        </transition>
    </div>
</div>
</template>

<script>
export default {
    props: ['patient_id', 'remove_url', 'redirect_path', 'message'],
    data: function() {
        return {
            isLoading: false,
        }
    },
    methods: {
        removeRecord() {
            axios.delete(this.remove_url)
                .then(response => {
                    this.isLoading = false;
                    this.isUpdateActive = false;
                    window.location.href = this.redirect_path;
                    console.log('Patient deleted');
                })
                .catch(errors => {
                    console.log(errors.response);
                });
        },
    }
}
</script>

<style>
.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
