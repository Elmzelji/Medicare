<template>
<div class="">
    <div v-if="calculateAge(birth) < 15" class="bg-gray-300 h-2 w-2 rounded-full ml-2"></div>
    <div v-if="calculateAge(birth) > 15 && type == 'homme'" class="bg-blue-600 h-2 w-2 rounded-full ml-2"></div>
    <div v-if="calculateAge(birth) > 15 && type == 'femelle'" class="bg-pink-600 h-2 w-2 rounded-full ml-2"></div>
</div>
</template>

<script>
export default {
    props: ['birth', 'type'],
    methods: {
        calculateAge(date) {
            var today = new Date();
            var dateBirth = new Date(date);
            var age = today.getFullYear() - dateBirth.getFullYear();
            var m = today.getMonth() - dateBirth.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dateBirth.getDate())) {
                age--;
            }
            return age;
        }
    }
}
</script>

<style lang="css" scoped>
</style>
