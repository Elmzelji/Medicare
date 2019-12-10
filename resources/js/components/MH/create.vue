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
            <form class="m-4 p-10 bg-white rounded shadow-xl">
                <div class="flex justify-between">
                    <div class="">

                    </div>
                    <div class="">
                        <input type="hidden" name="" value="">
                        <button v-if="calculateAge(patient.birthDate) < 15" type="button" class="focus:outline-none cursor-default rounded-full px-4 mr-2 bg-gray-300 text-white p-2 rounded  leading-none flex items-center">
                            {{reference}}
                        </button>
                        <button v-if="calculateAge(patient.birthDate) > 15 && patient.gender == 'homme'" type="button"
                          class="focus:outline-none cursor-default rounded-full px-4 mr-2 bg-blue-600 text-white p-2 rounded  leading-none flex items-center">
                            {{reference}}
                        </button>
                        <button v-if="calculateAge(patient.birthDate) > 15 && patient.gender == 'femelle'" type="button"
                          class="focus:outline-none cursor-default rounded-full px-4 mr-2 bg-pink-600 text-white p-2 rounded  leading-none flex items-center">
                            {{reference}}
                        </button>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="w-full mr-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Poids:<span class="text-red-700">*</span></h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="number" placeholder="Veuillez saisir le poids" v-model="weight"
                          required>
                    </div>
                    <div class="w-full ml-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">ATCD:</h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Veuillez saisir les Antécédence" v-model="ATCD"
                          required>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <div class="w-full mr-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">EXCV:<span class="text-red-700">*</span></h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Veuillez saisir le poids" v-model="EXCV"
                          required>
                    </div>
                    <div class="w-full ml-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">CAF:</h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Veuillez saisir les Antécédence" v-model="CAF"
                          required>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
</template>

<script>
export default {
    props: ['patient', 'count_docs'],
    data: function() {
        return {
            reference: this.generateRef(),
            weight: null,
            ATCD: null
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
        }
    }
}
</script>

<style lang="css" scoped>
</style>
