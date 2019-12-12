<template>
<div class="">
    <div class="relative">
        <div v-if="isOpen" style="bottom:100%" class="bg-white rounded rounded-md py-6 sm:p-6 border-t border-l border-r shadow-lg flex flex-col absolute w-full">
            <button type="button" @click="setResult(result, i)" v-for="(result, i) in results" :key="i" href="#" class="hover:bg-gray-300 px-4 rounded cursor-pointer text-left" :class="{ 'bg-blue-500': i === arrowCounter }">{{result.name}} <span
                  class="ml-2 bg-doc_primary rounded-full px-3 py-1 text-sm font-semibold text-white mr-2">{{result.symbole}}</span></button>
        </div>

        <div class="bg-white focus:shadow-outline border border-gray-300 rounded-lg py-2 sm:px-4 block w-full appearance-none leading-normal">
            <!-- <div class="flex flex-col flex-wrap sm:flex-row"> -->
            <div class="inline-flex flex-col sm:flex-row w-full flex-wrap">
                <span v-for="tag, index in tags" class="flex justify-between items-center bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mx-2 mt-2 sm:mr-2">
                    <span class="whitespace-no-wrap">{{tag.symbole}}</span>
                    <button @click=" removeTag(index)" type="button" name="button" class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4">
                            <path
                              d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 11-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 111.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 111.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 010 1.698z" />
                        </svg>
                    </button>
                </span>
                <input ref="search_input" @input="onChange" @keydown.down="onArrowDown" @keydown.up="onArrowUp" @keydown.enter="onEnter" v-on:keyup.delete="onDeleteDown"
                  class="flex-grow bg-white focus:outline-none rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" :placeholder="placeholder" required v-model="search">
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        placeholder: {
            type: String,
        },
        selected: {
            type: Array,
        },
        items: {
            type: Array,
            required: false,
            default: () => [],
        },
    },
    data: function() {
        return {
            isOpen: false,
            search: '',
            tags: this.selected,
            arrowCounter: -1,
        }
    },
    methods: {
        onArrowDown() {
            if (this.arrowCounter < this.results.length) {
                this.arrowCounter = this.arrowCounter + 1;
            }
        },
        onArrowUp() {
            if (this.arrowCounter > 0) {
                this.arrowCounter = this.arrowCounter - 1;
            }
        },
        onChange() {
            if (this.search !== "") {
                this.isOpen = true;
                this.filterResults();
            } else {
                this.isOpen = false;
            }
        },
        onEnter() {
            if (!this.tags.includes(this.results[this.arrowCounter])) {
                this.tags.push(this.results[this.arrowCounter]);
                this.$emit('tags', this.tags);
                this.search = "";
                this.isOpen = false;
                this.arrowCounter = -1;
            } else {
                this.search = "";
                this.isOpen = false;
                this.arrowCounter = -1;
            }
        },
        onDeleteDown() {
            if (this.tags)
                this.tags.pop();
        },
        filterResults() {
            this.results = this.items.filter(item => item.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1);
        },
        setResult(result, index) {
            if (!this.findDup(result.name)) {
                if (!this.tags.includes(result)) {
                    this.$emit('tags', this.tags);
                    this.tags.push(result);
                    this.search = "";
                    this.$refs.search_input.focus();
                    this.isOpen = false;
                }
            } else {
                this.search = "";
                this.isOpen = false;
                this.arrowCounter = -1;
            }
        },
        removeTag(tag) {
            this.tags.splice(tag, 1);
        },
        findDup(tagName) {
            var found = false;
            for (var i = 0; i < this.tags.length; i++) {
                if (this.tags[i].name === tagName) {
                    found = true;
                    return found;
                }
            }
            return found;
        },
        init() {
            if (this.tags === undefined) {
                this.tags = [];
            }
        }
    },
    mounted() {
        this.init()
    }
}
</script>

<style lang="css" scoped>
</style>
