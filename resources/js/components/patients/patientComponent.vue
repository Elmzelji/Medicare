<template>
<div class="text-center py-8 leading-relaxed">

    <div class="flex justify-between">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-6">
                <path
                  d="M12.452 4.516c.446.436.481 1.043 0 1.576L8.705 10l3.747 3.908c.481.533.446 1.141 0 1.574-.445.436-1.197.408-1.615 0-.418-.406-4.502-4.695-4.502-4.695a1.095 1.095 0 010-1.576s4.084-4.287 4.502-4.695c.418-.409 1.17-.436 1.615 0z" />
            </svg>
            <a :href="back_url" class="text-doc_primary">Retour aux patients</a>
        </div>
        <div class="flex items-center">
            <a :href="medical_doc_url" class="text-doc_primary">Dossier médical</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-6">
                <path d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z" />
            </svg>
        </div>
    </div>
    <h1 class="mt-4 sm:mt-0 text-xl font-semibold">{{patient_data.firstName}} {{patient_data.lastName}}</h1>
    <div class="text-left bg-white shadow p-6 mt-6">

        <div class="flex justify-between">
            <div class="flex items-center">
                <div v-if="calculateAge(patient_data.birthDate) < 15" class="bg-gray-300 h-2 w-2 rounded-full ml-2"></div>
                <div v-if="calculateAge(patient_data.birthDate) > 15 && patient_data.gender == 'homme'" class="bg-blue-600 h-2 w-2 rounded-full ml-2"></div>
                <div v-if="calculateAge(patient_data.birthDate) > 15 && patient_data.gender == 'femelle'" class="bg-pink-600 h-2 w-2 rounded-full ml-2"></div>
                <h2 class="ml-2 font-semibold">
                    À propos {{patient_data.firstName}}
                </h2>
            </div>

            <button href="#" type="button" @click="isUpdateActive = !isUpdateActive" class="focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-6">
                    <path v-if="!isUpdateActive"
                      d="M17.561 2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984 7.264 2.21 14.037 1.2 18.799l4.763-1.01 6.774-6.771 6.052-6.052c-.001 0 .216-1.083-1.228-2.527zM5.68 17.217l-1.624.35a3.71 3.71 0 00-.69-.932 3.742 3.742 0 00-.932-.691l.35-1.623.47-.469s.883.018 1.881 1.016c.997.996 1.016 1.881 1.016 1.881l-.471.468z" />
                    <path v-else
                      d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 11-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 111.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 111.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 010 1.698z" />
                </svg>
            </button>
        </div>
        <form>
            <slot></slot>

            <div class="mt-4 flex flex-col sm:flex-row">
                <div class="mt-4 sm:mt-0 sm:w-1/3">
                    <h1 class="font-medium text-sm text-gray-600 uppercase">INFOS PERSONNELLES</h1>
                    <div class="mt-6">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Nom:</h2>
                        <p v-if="!isUpdateActive">{{patient_data.lastName}}</p>
                        <input v-else="isUpdateActive" class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="lastName"
                          :placeholder="patient_data.lastName" :value="patient_data.lastName">
                    </div>
                    <div class="mt-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Prénom:</h2>
                        <p v-if="!isUpdateActive">{{patient_data.firstName}}</p>
                        <input v-else="isUpdateActive" class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="firstName"
                          :placeholder="patient_data.firstName" :value="patient_data.firstName">
                    </div>
                    <div class="mt-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">profession:</h2>
                        <p v-if="!isUpdateActive">{{patient_data.profession}}</p>
                        <input v-else="isUpdateActive" class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="profession"
                          :placeholder="patient_data.profession" :value="patient_data.profession">
                    </div>
                    <div class="mt-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Âge:</h2>
                        <h2 v-if="!isUpdateActive">{{ calculateAge(patient_data.birthDate) }}</h2>
                        <input v-else="isUpdateActive" class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="date" ref="birthDate"
                          :value="patient_data.birthDate">
                    </div>
                    <div class="mt-2" v-if="isUpdateActive">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Sexe:<span class="text-red-700">*</span></h2>

                        <div class="inline-block relative w-64">

                            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" v-model="gender" required>
                                <option disabled value="">Veuillez choisir le sexe</option>
                                <option value="homme">homme</option>
                                <option value="femelle">femelle</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 sm:w-1/3 sm:mx-6">
                    <h1 class="font-medium text-sm text-gray-600 uppercase">Contact</h1>
                    <div class="mt-6">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Téléphone:</h2>
                        <p v-if="!isUpdateActive">{{patient_data.phoneNumber}}</p>
                        <input v-else="isUpdateActive" class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="phoneNumber"
                          :placeholder="patient_data.phoneNumber" :value="patient_data.phoneNumber">
                    </div>
                    <div class="mt-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">adresse:</h2>
                        <p v-if="!isUpdateActive">{{patient_data.addresse}}</p>
                        <input v-else="isUpdateActive" class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="addresse"
                          :placeholder="patient_data.addresse" :value="patient_data.addresse">
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 sm:w-1/3">
                    <h1 class="font-medium text-sm text-gray-600 uppercase">référencement</h1>
                    <div class="mt-6">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Envoyé par:</h2>
                        <p v-if="!isUpdateActive">{{patient_data.sentBy}}</p>
                        <input v-else="isUpdateActive" class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="sentBy"
                          :placeholder="patient_data.sentBy" :value="patient_data.sentBy">
                    </div>
                </div>
            </div>
            <div v-if="isUpdateActive" class="mt-4 sm:mt-0 flex justify-end items-center">
                <button @click="showModal = true" class="text-sm text-gray-700 mr-4 focus:outline-none  font-medium hover:underline" type="button" name="removePatient">Remove {{patient_data.lastName}}</button>
                <loader v-if="isLoading"></loader>
                <button v-else="!isLoading" @click.prevent="updatePatient()" type="button" class="bg-doc_primary hover:bg-gray-400 hover:text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                        <path
                          d="M19.398 7.415l-7.444-1.996L10.651.558c-.109-.406-.545-.642-.973-.529L.602 2.461c-.428.114-.686.538-.577.944l3.23 12.051c.109.406.544.643.971.527l3.613-.967-.492 1.838c-.109.406.149.83.577.943l8.11 2.174c.428.115.862-.121.972-.529l2.97-11.084c.108-.406-.15-.83-.578-.943zM1.633 3.631l7.83-2.096 2.898 10.818-7.83 2.096L1.633 3.631zm14.045 14.832L8.864 16.6l.536-2.002 3.901-1.047c.428-.113.688-.537.578-.943l-1.508-5.627 5.947 1.631-2.64 9.851z" />
                    </svg>

                    <span>Mise à jour</span>
                </button>
            </div>
        </form>
    </div>
    <remove-record v-if="showModal" @close="showModal = false" :patient_id="patient_data.id" :remove_url="remove_url" :redirect_path="redirect_path"
      message="Vous êtes sûr de vouloir retirer ce patient ? En faisant cela, vous perdrez toutes les données sauvegardées et vous ne pourrez pas les réutiliser."></remove-record>
</div>
</template>

<script>
export default {
    props: ['patient', 'back_url', 'medical_doc_url', 'remove_url', 'redirect_path'],

    data: function() {
        return {
            showModal: false,
            patient_data: JSON.parse(this.patient),
            age: 0,
            isUpdateActive: false,
            isLoading: false,
            gender: JSON.parse(this.patient).gender,
        }
    },
    methods: {
        updatePatient(url = '/apipatients/' + this.patient_data.id) {
            this.isLoading = true;
            axios.put(url, {
                    lastName: this.$refs.lastName.value,
                    firstName: this.$refs.firstName.value,
                    profession: this.$refs.profession.value,
                    birthDate: this.$refs.birthDate.value,
                    phoneNumber: this.$refs.phoneNumber.value,
                    addresse: this.$refs.addresse.value,
                    sentBy: this.$refs.sentBy.value,
                    gender: this.gender,
                })
                .then(response => {
                    this.isLoading = false;
                    this.isUpdateActive = false;
                    this.patient_data = response.data.data;
                    console.log(response.data.data);
                })
                .catch(errors => {
                    console.log(errors);
                });
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
