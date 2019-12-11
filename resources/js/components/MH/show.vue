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

                <div class="mt-6" v-if="JSON.parse(history.ATCD).length > 0">
                    <h2 class="font-semibold uppercase text-gray-700 text-sm">ATCD:</h2>
                    <div v-if="!isUpdate" class="bg-white focus:outline-none focus:shadow-none border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">

                        <div class="flex">
                            <span v-for="tag, index in JSON.parse(history.ATCD)" class="flex items-center bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                {{tag.name}}
                            </span>
                        </div>

                    </div>
                    <quick-reply v-else :items="items" placeholder="Test 1" @tags="setATCD" :selected="tagsATCD"></quick-reply>
                </div>

                <div class="mt-6" v-if="JSON.parse(history.EXCV).length > 0">
                    <h2 class="font-semibold uppercase text-gray-700 text-sm">EXCV:</h2>

                    <div v-if="!isUpdate" class="bg-white focus:outline-none focus:shadow-none border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">

                        <div class="flex">
                            <span v-for="tag, index in JSON.parse(history.EXCV)" class="flex items-center bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                {{tag.name}}
                            </span>
                        </div>

                    </div>

                    <quick-reply v-else :items="items" placeholder="Test 2" @tags="setEXCV" :selected="tagsEXCV"></quick-reply>
                </div>

                <div class="mt-6" v-if="JSON.parse(history.CAF).length > 0">
                    <h2 class="font-semibold uppercase text-gray-700 text-sm">CAF:</h2>

                    <div v-if="!isUpdate" class="bg-white focus:outline-none focus:shadow-none border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">

                        <div class="flex">
                            <span v-for="tag, index in JSON.parse(history.CAF)" class="flex items-center bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                {{tag.name}}
                            </span>
                        </div>

                    </div>

                    <quick-reply v-else :items="items" placeholder="Veuillez saisir les Antécédence" @tags="setCAF" :selected="tagsCAF">
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
</div>
</template>

<script>
export default {
    props: ['patient', 'history'],
    data: function() {
        return {
            isUpdate: false,
            reference: this.generateRef(),
            weight: this.history.weight,
            note: this.history.note,
            tagsATCD: JSON.parse(this.history.ATCD),
            tagsEXCV: JSON.parse(this.history.EXCV),
            tagsCAF: JSON.parse(this.history.CAF),
            tag: '',
            tags: [],
            isLoading: false,
            message: {
                text: null,
                type: null
            },
            items: [{
                    name: 'Traumatisme',
                    symbole: '𝓩'
                },
                {
                    name: 'Fracture',
                    symbole: 'F̸'
                },
                {
                    name: 'Tissu',
                    symbole: 'T̸'
                },
                {
                    name: 'Grossesse',
                    symbole: 'G̅'
                },
                {
                    name: 'Grossesse extra urerine',
                    symbole: 'GEU'
                },
                {
                    name: 'Pression',
                    symbole: 'P̅'
                },
                {
                    name: 'Diabeter',
                    symbole: '(D)'
                },
                {
                    name: 'Douleur',
                    symbole: 'D̅'
                },
                {
                    name: 'Diarrhée',
                    symbole: 'D̲'
                },
                {
                    name: 'carrot',
                    symbole: 'D̲ C'
                },
                {
                    name: 'Histolo',
                    symbole: 'H̸'
                },
                {
                    name: 'Cytologie',
                    symbole: 'C̸'
                },
                {
                    name: 'Trouble psychique',
                    symbole: '𝒯 psy'
                },
                {
                    name: 'Insuffisance coronarienne',
                    symbole: 'I Cˣ'
                },
                {
                    name: 'Insuffisance respiratoire',
                    symbole: 'I Resp'
                },
                {
                    name: 'Insuffisance rerale',
                    symbole: 'I Rᴸ'
                },
                {
                    name: 'Insuffisance hépatique',
                    symbole: 'I Hep'
                },
                {
                    name: 'Hysterie',
                    symbole: 'H'
                },
                {
                    name: 'Splenomegalie',
                    symbole: 'SMG'
                },
                {
                    name: 'Hépatomégalie',
                    symbole: 'HMG'
                },
                {
                    name: 'Adénopathie',
                    symbole: 'ADP'
                },
                {
                    name: 'Adénopathie latero cervicale',
                    symbole: 'ADP+LC'
                },
                {
                    name: 'Ganglion',
                    symbole: 'gg'
                },
                {
                    name: 'Rein',
                    symbole: 'Rᶦ'
                },
                {
                    name: 'Néphrectomie',
                    symbole: 'Řᶦ'
                },
                {
                    name: 'Vesicle biliar',
                    symbole: 'VB'
                }

            ],
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
