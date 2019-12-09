<template>
<div class="text-center py-8 leading-relaxed">
    <alert></alert>
    <div class="flex items-start">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-6">
            <path
              d="M12.452 4.516c.446.436.481 1.043 0 1.576L8.705 10l3.747 3.908c.481.533.446 1.141 0 1.574-.445.436-1.197.408-1.615 0-.418-.406-4.502-4.695-4.502-4.695a1.095 1.095 0 010-1.576s4.084-4.287 4.502-4.695c.418-.409 1.17-.436 1.615 0z" />
        </svg>
        <a :href="back_url" class="text-doc_primary">Retour aux patients</a>
    </div>
    <h1 class="text-xl font-semibold">{{firstName}} <span class="uppercase">{{lastName}}</span></h1>
    <div class="text-left bg-white border shadow p-6 mt-6">
        <div class="flex items-center">
            <div v-if="calculateAge(birthDate) < 15" class="bg-gray-300 h-2 w-2 rounded-full ml-2"></div>
            <div v-if="calculateAge(birthDate) > 15 && gender == 'homme'" class="bg-blue-600 h-2 w-2 rounded-full ml-2"></div>
            <div v-if="calculateAge(birthDate) > 15 && gender == 'femelle'" class="bg-pink-600 h-2 w-2 rounded-full ml-2"></div>
            <h2 class="ml-2 font-semibold">
                À propos {{firstName}}
            </h2>
        </div>

        <form id="validated-form">
            <slot></slot>

            <div class="mt-4 flex">
                <div class="w-1/3">
                    <h1 class="font-medium text-sm text-gray-600 uppercase">INFOS PERSONNELLES</h1>
                    <div class="mt-6">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Prénom:<span class="text-red-700">*</span></h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="firstName" placeholder="Prénom" v-model="firstName"
                          required>

                    </div>
                    <div class="mt-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Nom:<span class="text-red-700">*</span></h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="lastName" placeholder="Nom" v-model="lastName" required>
                    </div>
                    <div class="mt-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">profession:</h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="profession" placeholder="Profession"
                          v-model="profession">
                    </div>
                    <div class="mt-2">
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
                    <div class="mt-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Date de naissance:<span class="text-red-700">*</span></h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="date" ref="birthDate" placeholder="Date de naissance"
                          v-model="birthDate" required>
                    </div>
                </div>
                <div class="w-1/3 mx-6">
                    <h1 class="font-medium text-sm text-gray-600 uppercase">Contact</h1>
                    <div class="mt-6">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Téléphone:</h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="phoneNumber" placeholder="Numéro de téléphone"
                          v-model="phoneNumber">
                    </div>
                    <div class="mt-2">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">adresse:</h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="addresse" placeholder="Hay salama 3 bloc c group 9"
                          v-model="addresse">
                    </div>
                </div>
                <div class="w-1/3">
                    <h1 class="font-medium text-sm text-gray-600 uppercase">référencement</h1>
                    <div class="mt-6">
                        <h2 class="font-semibold uppercase text-gray-700 text-sm">Envoyé par:</h2>
                        <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" ref="sentBy" placeholder="Patient envoyé par"
                          v-model="sentBy">
                    </div>
                </div>
            </div>
            <div class="flex justify-end items-center">
                <loader v-if="isLoading"></loader>
                <button v-else="!isLoading" @click.prevent="addPatient()" type="button" class="bg-doc_primary hover:bg-gray-400 hover:text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center">


                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                        <path d="M15.173 2H4c-1.101 0-2 .9-2 2v12c0 1.1.899 2 2 2h12c1.101 0 2-.9 2-2V5.127L15.173 2zM14 8c0 .549-.45 1-1 1H7c-.55 0-1-.451-1-1V3h8v5zm-1-4h-2v4h2V4z" /></svg>

                    <span>Sauvegarder le patient</span>
                </button>
            </div>
        </form>
    </div>

</div>
</template>

<script>
export default {
    props: ['back_url'],
    data: function() {
        return {
            isLoading: false,
            firstName: "",
            lastName: "",
            birthDate: "",
            gender: "",
            profession: "",
            phoneNumber: "",
            sentBy: "",
            addresse: "",

            message: {
                text: null,
                type: null
            }
        }
    },
    methods: {
        addPatient(url = '/apipatients') {
            if (this.validateForm()) {
                this.isLoading = true;
                axios.post(url, {
                        lastName: this.lastName,
                        firstName: this.firstName,
                        profession: this.profession,
                        birthDate: this.birthDate,
                        phoneNumber: this.phoneNumber,
                        addresse: this.addresse,
                        sentBy: this.sentBy,
                        gender: this.gender
                    })
                    .then(response => {
                        this.isLoading = false;
                        console.log(response);
                        window.location.href = '/patients/show/' + response.data.data.id;
                    })
                    .catch(errors => {
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
                    text: "Assurez-vous que toutes les données requises sont remplies.",
                    type: 'error',
                }
                Bus.$emit('flash-message', this.message);
            }
        },
        validateForm() {
            var state = false;
            if (this.lastName) {
                state = true;
                if (this.firstName) {
                    state = true;
                    if (this.birthDate) {
                        state = true;
                        if (this.gender) {
                            state = true;
                        }
                    }
                }
            }
            return state;
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
