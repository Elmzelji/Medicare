<template>
<header class="sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3">
    <div class="flex items-center justify-between px-4 py-3 sm:p-0">
        <a :href="home_url">
            <img class="w-40" :src="logo" alt="Doc ibrahim">
        </a>
        <div class="sm:hidden">
            <button @click="isOpen = !isOpen" type="button" class="block text-doc_text hover:text-doc_text focus:text-doc_primary focus:outline-none">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path v-if="isOpen" fill-rule="evenodd"
                      d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
                    <path v-if="!isOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                </svg>
            </button>
        </div>
    </div>
    <nav :class="isOpen ? 'block' : 'hidden'" class="px-2 pt-2 pb-4 sm:flex sm:p-0">
        <a :href="route_dash" class="ml-4">
            <span class="text-pack_text text-sm sm:font-medium block px-2 py-1">Dashboard</span>
        </a>
        <a :href="route_patients" class="mt-4 block px-2 py-1 sm:font-medium text-sm sm:mt-0 sm:ml-2">Patients</a>
        <a :href="route_settings" class="mt-4 block px-2 py-1 sm:mt-0 sm:ml-2">
            <span class="text-pack_text text-sm sm:font-medium">Paramètres</span>
        </a>
        <a :href="route_logout" class="no-underline font-medium sm:font-normal hover:underline text-pack_text text-sm mt-4 block px-2 py-1 sm:mt-0 sm:ml-2" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">Déconnecter</a>
        <form id="logout-form" :action="route_logout" method="POST" class="hidden">
            <slot name="csrf"></slot>
        </form>
    </nav>
</header>
</template>

<script>
export default {
    props: ['home_url', 'logo', 'route_dash', 'route_patients', 'route_settings', 'route_logout'],
    data() {
        return {
            isOpen: false,
        }
    },
}
</script>

<style lang="css" scoped>
</style>
