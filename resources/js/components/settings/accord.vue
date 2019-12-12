<template>
<div class="border-b">
    <div class="border-l-2 bg-grey-lightest border-indigo">
        <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none" @click="toggle">
            <span class="text-doc_text font-medium text-xl">
                {{heading}}
            </span>
            <div class="rounded-full border border border-doc_primary w-7 h-7 flex items-center justify-center" :class="isOpen ? 'bg-doc_primary' : 'bg-white'">
                <!-- icon by feathericons.com -->
                <svg v-if="isOpen" aria-hidden="true" data-reactid="281" fill="none" height="24" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <polyline points="18 15 12 9 6 15">
                    </polyline>
                </svg>
                <svg v-else aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <polyline points="6 9 12 15 18 9">
                    </polyline>
                </svg>
            </div>
        </header>
        <div v-show="isOpen">
            <slot name="content"></slot>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['heading'],
    data() {
        return {
            isOpen: false,
        };
    },
    methods: {
        toggle() {
            this.isOpen = !this.isOpen;
        },
    }
}
</script>

<style lang="css" scoped>
</style>
