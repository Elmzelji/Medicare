<template>
<div class="w-2/3 mx-10">

    <div v-for="(element, index) in elements" class="flex items-center mt-6">

        <div class="">
            <h2 class="font-medium uppercase text-gray-700 text-sm">Symbole:</h2>
            <input type="text" value="" class="w-1/2 mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" v-model="element.symbole">
        </div>

        <div class="mx-6"><span class="font-semibold text-lg text-doc_text">=></span></div>

        <div class="">
            <h2 class="font-medium uppercase text-gray-700 text-sm">Name:</h2>
            <div class="flex items-center">
                <input type="text" value="" class="w-1/2 mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" v-model="element.name">
                <button type="button" name="button" class="ml-2" @click="removeRecord(index)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-red-700 w-6">
                        <path d="M10 1.6a8.4 8.4 0 100 16.8 8.4 8.4 0 000-16.8zm5 9.4H5V9h10v2z" /></svg>
                </button>
            </div>
        </div>


    </div>

    <loader v-if="isLoading"></loader>

    <button v-if="!isLoading" type="button" @click="addElement" class="my-6 self-end bg-gray-400 text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center mx-auto">


        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
            <path d="M15.173 2H4c-1.101 0-2 .9-2 2v12c0 1.1.899 2 2 2h12c1.101 0 2-.9 2-2V5.127L15.173 2zM14 8c0 .549-.45 1-1 1H7c-.55 0-1-.451-1-1V3h8v5zm-1-4h-2v4h2V4z" /></svg>

        <span>Add symbole</span>
    </button>
    <button v-if="!isLoading" type="button" @click="saveElements" class="my-6 self-end bg-doc_primary hover:bg-gray-400 hover:text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center mx-auto">


        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
            <path d="M15.173 2H4c-1.101 0-2 .9-2 2v12c0 1.1.899 2 2 2h12c1.101 0 2-.9 2-2V5.127L15.173 2zM14 8c0 .549-.45 1-1 1H7c-.55 0-1-.451-1-1V3h8v5zm-1-4h-2v4h2V4z" /></svg>

        <span>Save symbole</span>
    </button>
</div>
</template>

<script>
export default {
    props: ['symbols_items', 'update_route'],
    data: function() {
        return {
            elements: this.symbols_items,
            isLoading: false,
        };
    },
    methods: {
        addElement: function() {
            this.elements.push({
                name: '',
                symbole: ''
            });
        },
        saveElements() {
            this.isLoading = true;
            axios.post(this.update_route, {
                data: this.elements
            }).then(response => {
                this.isLoading = false;
                console.log(response.data);
                //window.location.href = '/settings';
            }).catch(errors => {
                console.log(errors.response);
                this.isLoading = false;
                this.message = {
                    text: "Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.",
                    type: 'error',
                }
                Bus.$emit('flash-message', this.message);
            });
        },
        removeRecord(node) {
            this.elements.splice(node, 1);
            this.saveElements();
        }
    }
}
</script>

<style lang="css" scoped>
</style>
