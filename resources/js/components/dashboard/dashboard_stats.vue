<template>
<div class="flex items-center px-6 lg:hidden">
    <div class="flex-grow flex-no-shrink py-6">
        <div class="text-grey-darker mb-2">
            <span class="text-5xl">{{selected}}</span>
        </div>
    </div>
    <div class="flex-shrink flex items-center justify-between w-32">
        <select v-model="selected" id="states" class="block appearance-none w-full bg-white border border-grey-light px-4 py-2 pr-8 rounded">
            <option :value="patients" selected="selected">Patient</option>
            <option :value="atcd">Antécédents</option>
            <option :value="revenue">Revenue</option>
        </select>
    </div>
</div>



</div>
</template>

<script type="text/javascript">
export default {
    props: ['patients', 'revenue', 'atcd'],
    data() {
        return {
            selected: this.patients
        }
    }
}
</script>
