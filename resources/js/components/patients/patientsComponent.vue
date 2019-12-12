<template>
<div class="flex flex-col">
    <div class="flex flex-col sm:flex-row justify-between items-center mt-4">
        <div class="">
            <a href="/apipatients/create" class="bg-doc_primary hover:bg-gray-400 hover:text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center">



                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="fill-current w-6 h-6 mr-2">
                    <path
                      d="M512 224a128 128 0 10128 128 128 128 0 00-128-128zm64 144a5.33 5.33 0 01-5.33 5.33h-37.34v37.34A5.33 5.33 0 01528 416h-32a5.33 5.33 0 01-5.33-5.33v-37.34h-37.34A5.33 5.33 0 01448 368v-32a5.33 5.33 0 015.33-5.33h37.34v-37.34A5.33 5.33 0 01496 288h32a5.33 5.33 0 015.33 5.33v37.34h37.34A5.33 5.33 0 01576 336z"
                      opacity=".4" />
                    <path
                      d="M352 352c0-19.1 3.92-37.17 10.09-54.17A152.59 152.59 0 01320 304c-24.6 0-47.6-6-68.5-16h-8.3A115.23 115.23 0 00128 403.2V432a48 48 0 0048 48h241c-39.22-29.19-65-75.47-65-128zM96 224a64 64 0 10-64-64 64 64 0 0064 64zm77.1 50.6A63.81 63.81 0 00128 256H64a64.06 64.06 0 00-64 64v32a32 32 0 0032 32h65.9a146.64 146.64 0 0175.2-109.4zM319.88 256h.12a111.94 111.94 0 10-.12 0z"
                      class="fa-primary" /></svg>


                <span>Ajouter un patient</span>
            </a>
        </div>
        <div class="flex mt-4 sm:mt-0">
            <input class="py-2 px-4 pr-8" type="text" v-model="tableData.search" placeholder="Chercher un patient" @input="getPatients()" :disabled="patients.length > 0 ? 'disabled' : ''">

            <div class="ml-4">
                <div class="flex items-center">
                    <select class="text-sm block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 rounded" v-model="tableData.length" @change="getPatients()"
                      :disabled="patients.length > 0 ? 'disabled' : ''">
                        <option v-for="(records, index) in perPage" :key="index" :value="records">
                            {{records}} / page
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-12 text-center" :class="patients.length > 0 ? 'hidden' : ''">
        <p class="text-lg">Sorry there is no patient to show ! try to add some</p>
    </div>

    <section :class="patients.length > 0 ? '':'hidden'">
        <datatable class="overflow-x-scroll sm:overflow-hidden mt-6 bg-white" :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders" @sort="sortBy">
            <tbody>
                <tr v-for="patient in patients" :key="patient.id">
                    <td class="border px-4 py-2">{{patient.firstName}}</td>
                    <td class="border px-4 py-2">
                        <div v-if="calculateAge(patient.birthDate) < 15" class="bg-gray-300 h-2 w-2 rounded-full ml-2 inline-block"></div>
                        <div v-if="calculateAge(patient.birthDate) > 15 && patient.gender == 'homme'" class="bg-blue-600 h-2 w-2 rounded-full ml-2 inline-block"></div>
                        <div v-if="calculateAge(patient.birthDate) > 15 && patient.gender == 'femelle'" class="bg-pink-600 h-2 w-2 rounded-full ml-2 inline-block"></div>
                        <span class="uppercase">
                            {{patient.lastName}}
                        </span>
                    </td>
                    <td class="border px-4 py-2">{{patient.phoneNumber}}</td>
                    <td class=" border text-doc_text px-4 py-2">

                        <a :href="'/patients/show/'+patient.id" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                                <path
                                  d="M19.398 7.415l-7.444-1.996L10.651.558c-.109-.406-.545-.642-.973-.529L.602 2.461c-.428.114-.686.538-.577.944l3.23 12.051c.109.406.544.643.971.527l3.613-.967-.492 1.838c-.109.406.149.83.577.943l8.11 2.174c.428.115.862-.121.972-.529l2.97-11.084c.108-.406-.15-.83-.578-.943zM1.633 3.631l7.83-2.096 2.898 10.818-7.83 2.096L1.633 3.631zm14.045 14.832L8.864 16.6l.536-2.002 3.901-1.047c.428-.113.688-.537.578-.943l-1.508-5.627 5.947 1.631-2.64 9.851z" />
                            </svg>

                            <span>Afficher</span>
                        </a>

                    </td>
                </tr>
            </tbody>
        </datatable>
    </section>

    <section :class="patients.length > 0 ? '' : 'hidden'">
        <pagination :pagination="pagination" @prev="getPatients(pagination.prevPageUrl)" @next="getPatients(pagination.nextPageUrl)">
        </pagination>
    </section>




</div>
</template>

<script type="text/javascript">
import Datatable from '../datatables/Datatable.vue'
import Pagination from '../datatables/Pagination.vue'

export default {
    components: {
        datatable: Datatable,
        pagination: Pagination
    },
    created() {
        this.getPatients();
    },
    data() {
        let sortOrders = {};
        let columns = [{
                width: '33%',
                label: 'Prénom',
                name: 'firstName'
            },
            {
                width: '33%',
                label: 'Nom de famille',
                name: 'lastName'
            },
            {
                width: '33%',
                label: 'Numéro de téléphone',
                name: 'phoneNumber'
            }
        ];
        columns.forEach((column) => {
            sortOrders[column.name] = -1;
        });
        return {

            patients: [],
            columns: columns,
            sortKey: 'lastName',
            sortOrders: sortOrders,
            perPage: ['10', '20', '30'],
            tableData: {
                draw: 0,
                length: 10,
                search: '',
                column: 0,
                dir: 'desc',
            },
            pagination: {
                lastPage: '',
                currentPage: '',
                total: '',
                lastPageUrl: '',
                nextPageUrl: '',
                prevPageUrl: '',
                from: '',
                to: ''
            },

        }
    },
    methods: {
        getPatients(url = '/apipatients') {
            this.tableData.draw++;
            axios.get(url, {
                    params: this.tableData
                })
                .then(response => {
                    let data = response.data;
                    if (this.tableData.draw == data.draw) {
                        this.patients = data.data.data;
                        this.configPagination(data.data);
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        configPagination(data) {
            this.pagination.lastPage = data.last_page;
            this.pagination.currentPage = data.current_page;
            this.pagination.total = data.total;
            this.pagination.lastPageUrl = data.last_page_url;
            this.pagination.nextPageUrl = data.next_page_url;
            this.pagination.prevPageUrl = data.prev_page_url;
            this.pagination.from = data.from;
            this.pagination.to = data.to;
        },
        sortBy(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
            this.tableData.column = this.getIndex(this.columns, 'name', key);
            this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
            this.getPatients();
        },
        getIndex(array, key, value) {
            return array.findIndex(i => i[key] == value)
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
};
</script>
