<template>
<div class="py-8 leading-relaxed mx-auto">
    <alert></alert>

    <div class="">
        <div class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-6">
                <path
                  d="M12.452 4.516c.446.436.481 1.043 0 1.576L8.705 10l3.747 3.908c.481.533.446 1.141 0 1.574-.445.436-1.197.408-1.615 0-.418-.406-4.502-4.695-4.502-4.695a1.095 1.095 0 010-1.576s4.084-4.287 4.502-4.695c.418-.409 1.17-.436 1.615 0z" />
            </svg>
            <a :href="'/patients/show/'+patient.id" class="text-doc_primary">Retour à {{ patient.lastName }} profile</a>
        </div>
    </div>
    <section>
        <div class="leading-loose">
            <form class="m-4 p-10 bg-white rounded shadow-xl z-10">
                <div class="flex justify-between mb-4">
                    <div class="">
                        <input type="hidden" name="" value="">
                        <button v-if="calculateAge(patient.birthDate) < 15" type="button" class="focus:outline-none focus:shadow-none cursor-default rounded-full px-4 mr-2 bg-gray-300 text-white p-2 rounded  leading-none flex items-center">
                            <span class="font-semibold">Reference</span> <span class="ml-2">{{ history.Reference}}</span>
                        </button>
                        <button v-if="calculateAge(patient.birthDate) > 15 && patient.gender == 'homme'" type="button"
                          class="focus:outline-none cursor-default rounded-full px-4 mr-2 bg-blue-600 text-white p-2 rounded rounded-l-none leading-none flex items-center">
                            <span class="font-semibold">Reference</span> <span class="ml-2">{{ history.Reference}}</span>
                        </button>
                        <button v-if="calculateAge(patient.birthDate) > 15 && patient.gender == 'femelle'" type="button"
                          class="focus:outline-none cursor-default rounded-full px-4 mr-2 bg-pink-600 text-white p-2 rounded  leading-none flex items-center">
                            <span class="font-semibold">Reference</span> <span class="ml-2">{{ history.Reference}}</span>
                        </button>
                    </div>
                    <div class="">
                        <button href="#" type="button" @click="isUpdate = !isUpdate" class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-6">
                                <path v-if="!isUpdate"
                                  d="M17.561 2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984 7.264 2.21 14.037 1.2 18.799l4.763-1.01 6.774-6.771 6.052-6.052c-.001 0 .216-1.083-1.228-2.527zM5.68 17.217l-1.624.35a3.71 3.71 0 00-.69-.932 3.742 3.742 0 00-.932-.691l.35-1.623.47-.469s.883.018 1.881 1.016c.997.996 1.016 1.881 1.016 1.881l-.471.468z" />
                                <path v-else
                                  d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 11-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 111.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 111.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 010 1.698z" />
                            </svg>

                        </button>

                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="w-full mr-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Poids:<span class="text-red-700">*</span></h2>
                        <div v-if="!isUpdate" class="bg-white focus:outline-none focus:shadow-none border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">
                            {{history.weight}}
                        </div>
                        <input v-else class="bg-white focus:outline-none focus:shadow-none border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="number" placeholder="Veuillez saisir le poids" v-model="weight"
                          required>
                    </div>
                </div>



                <div class="mt-6">
                    <h2 class="font-semibold uppercase text-gray-700 text-sm">ATCD:</h2>
                    <div v-if="!isUpdate" class="bg-white focus:outline-none focus:shadow-none border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">

                        <div class="flex">
                            <div v-if="JSON.parse(history.ATCD).length > 0" class="flex items-center">
                                <span v-for="tag, index in JSON.parse(history.ATCD)" class="mr-2 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                                    {{tag.name}}
                                </span>
                            </div>
                            <span v-else>Vide</span>
                        </div>

                    </div>
                    <quick-reply v-else :items="itemsATCD" placeholder="Veuillez saisir les ATCD" @tags="setATCD" :selected="tagsATCD"></quick-reply>
                </div>

                <div class="mt-6">
                    <h2 class="font-semibold uppercase text-gray-700 text-sm">EXCV:</h2>

                    <div v-if="!isUpdate" class="bg-white focus:outline-none focus:shadow-none border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">

                        <div class="flex">
                            <div v-if="JSON.parse(history.EXCV).length > 0" class="flex items-center">
                                <span v-for="tag, index in JSON.parse(history.EXCV)" class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    {{tag.name}}
                                </span>
                            </div>

                            <span v-else class="flex items-center px-3 py-1 text-sm font-semibold text-gray-500 mr-2">
                                Vide
                            </span>

                        </div>

                    </div>

                    <quick-reply v-else :items="itemsEXCV" placeholder="Veuillez saisir les EXCV" @tags="setEXCV" :selected="tagsEXCV"></quick-reply>
                </div>

                <div class="mt-6">
                    <h2 class="font-semibold uppercase text-gray-700 text-sm">CAF:</h2>

                    <div v-if="!isUpdate" class="bg-white focus:outline-none focus:shadow-none border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">

                        <div class="flex">
                            <div v-if="JSON.parse(history.CAF).length > 0" class="flex items-center">
                                <span v-for="tag, index in JSON.parse(history.CAF)" class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    {{tag.name}}
                                </span>
                            </div>

                            <span v-else class="flex items-center px-3 py-1 text-sm font-semibold text-gray-500 mr-2">
                                Vide
                            </span>

                        </div>

                    </div>

                    <quick-reply v-else :items="itemsCAF" placeholder="Veuillez saisir les CAF" @tags="setCAF" :selected="tagsCAF">
                    </quick-reply>
                </div>

                <div class="mt-6">
                    <h2 class="font-semibold uppercase text-gray-700 text-sm">Note:</h2>
                    <div v-if="!isUpdate" class="focus:shadow-none focus:outline-none bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">
                        {{history.note}}
                    </div>
                    <textarea v-else v-model="note" name="note" rows="3"
                      class="focus:shadow-none focus:outline-none bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal"></textarea>
                </div>
                <div v-if="isUpdate" class="flex justify-end items-center mt-6">

                    <button @click="showModal = true" class="text-sm text-gray-700 mr-4 focus:outline-none  font-medium hover:underline" type="button" name="removePatient">Remove {{patient.lastName}} Record</button>
                    <loader v-if="isLoading"></loader>

                    <button v-else="!isLoading" @click.prevent="updateRecord()" type="button" class="bg-doc_primary hover:bg-gray-400 hover:text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center">


                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                            <path d="M15.173 2H4c-1.101 0-2 .9-2 2v12c0 1.1.899 2 2 2h12c1.101 0 2-.9 2-2V5.127L15.173 2zM14 8c0 .549-.45 1-1 1H7c-.55 0-1-.451-1-1V3h8v5zm-1-4h-2v4h2V4z" /></svg>

                        <span>Sauvegarder le record</span>
                    </button>
                </div>
            </form>
        </div>
    </section>
    <remove-record v-if="showModal" @close="showModal = false" :patient_id="patient.id" :remove_url="remove_url" :redirect_path="redirect_path"
      message="Vous êtes sûr de vouloir retirer ce antécédents ? En faisant cela, vous perdrez toutes les données sauvegardées et vous ne pourrez pas les réutiliser."></remove-record>

</div>
</template>

<script>
export default {
    props: ['patient', 'history', 'remove_url', 'redirect_path', 'settings'],
    data: function() {
        return {
            showModal: false,
            isUpdate: false,
            reference: this.generateRef(),
            weight: this.history.weight,
            note: this.history.note,
            tagsATCD: JSON.parse(this.history.ATCD),
            tagsEXCV: JSON.parse(this.history.EXCV),
            tagsCAF: JSON.parse(this.history.CAF),
            itemsATCD: JSON.parse(this.settings.ATCD),
            itemsEXCV: JSON.parse(this.settings.EXCV),
            itemsCAF: JSON.parse(this.settings.CAF),
            tag: '',
            tags: [],
            isLoading: false,
            message: {
                text: null,
                type: null
            },
        }
    },
    methods: {
        generateRef() {
            return 'doc_' + this.patient.id + '/' + (this.count_docs + 1);
        },
        calculateAge(birth) {
            var today = new Date();
            var birthDate = new Date(birth);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        },
        setCAF(data) {
            this.tagsCAF = data;
        },
        setEXCV(data) {
            this.tagsEXCV = data;
        },
        setATCD(data) {
            this.tagsATCD = data;
        },
        updateRecord(url = '/apidocs/' + this.history.id) {
            if (this.validateForm()) {
                this.isLoading = true;
                axios.put(url, {
                    weight: this.weight,
                    ATCD: this.tagsATCD,
                    EXCV: this.tagsEXCV,
                    CAF: this.tagsCAF,
                    note: this.note,
                }).then(response => {
                    this.isLoading = false;
                    console.log(response.data.data);
                    window.location.href = '/patients/show/' + response.data.data.patient_id;
                }).catch(errors => {
                    console.log(errors.response);
                    this.isLoading = false;
                    this.message = {
                        text: "Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.",
                        type: 'error',
                    }
                    Bus.$emit('flash-message', this.message);
                });
            } else {
                this.isLoading = false;
                this.message = {
                    text: "Assurez-vous que toutes le poids et remplies.",
                    type: 'error',
                }
                Bus.$emit('flash-message', this.message);
            }
        },
        validateForm() {
            var state = false;
            if (this.weight) {
                state = true;
            }
            return state;
        }
    }
}
</script>

<style lang="css" scoped>
</style>
