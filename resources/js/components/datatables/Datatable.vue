<template id="">
<div class="w-full">
    <table class="table-fixed">
        <thead>
            <tr>
                <th v-for="column in columns" :key="column.name" @click="$emit('sort', column.name)" :class="sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'"
                  :style="'width:'+column.width+';'+'cursor:pointer;'" class="w-1/2 px-4 py-2">
                    {{column.label}}
                </th>
            </tr>
        </thead>
        <slot></slot>
    </table>
</div>
</template>

<script type="text/javascript">
export default {
    props: ['columns', 'sortKey', 'sortOrders']
}
</script>
