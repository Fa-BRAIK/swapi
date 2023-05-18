<script lang="ts" setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import EmptyLayout from "../layouts/EmptyLayout.vue";
import SearchInput from '../components/SearchInput.vue';

const router = useRouter();

const search = ref("");

const startSearch = async () => {
    if (search.value) {
        await router.push({ name: "people", query: { search: search.value } });
    }
};
</script>

<template>
    <EmptyLayout>
        <div
            class="flex flex-col gap-12 h-[100vh] w-100 justify-center items-center"
        >
            <h2 class="text-5xl">
                {{ $t("main.swapi") }}
            </h2>

            <form class="flex" @submit.prevent="startSearch">
               <SearchInput v-model="search" />
            </form>

            <h4 class="text-2xl uppercase">{{ $t("main.or-checkout") }}</h4>

            <div class="flex gap-5">
                <RouterLink
                    :to="{ name: 'people' }"
                    class="bg-blue-600 outline outline-blue-600 text-white px-4 py-0 rounded hover:bg-blue-800 hover:outline-blue-800"
                >
                    {{ $t("main.tabs.people") }}
                </RouterLink>

                <RouterLink
                    :to="{ name: 'starships' }"
                    class="bg-blue-600 outline outline-blue-600 text-white px-4 py-0 rounded hover:bg-blue-800 hover:outline-blue-800"
                >
                    {{ $t("main.tabs.starships") }}
                </RouterLink>

                <RouterLink
                    :to="{ name: 'planets' }"
                    class="bg-blue-600 outline outline-blue-600 text-white px-4 py-0 rounded hover:bg-blue-800 hover:outline-blue-800"
                >
                    {{ $t("main.tabs.planets") }}
                </RouterLink>
            </div>
        </div>
    </EmptyLayout>
</template>
