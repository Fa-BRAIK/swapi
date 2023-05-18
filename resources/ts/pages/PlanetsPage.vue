<script lang="ts" setup>
import { onBeforeMount } from "vue";
import BaseLayout from "../layouts/BaseLayout.vue";
import { useList } from "../composables/useList.composable";

const { planets, nextLink, get } = useList();

onBeforeMount(async () => await get('planets'));
</script>

<template>
    <BaseLayout>
        <div class="flex flex-col items-center gap-8 justify-center mb-12">
            <h2 class="text-5xl">{{ $t("main.tabs.planets") }}</h2>
        </div>

        <div class="max-w-[100%] w-100 overflow-x-auto">   
            <table class="w-[100%] text-center">
                <thead>
                    <tr>
                        <th class="px-4 py-2">{{ $t("main.planets.name") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.diameter") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.rotation_period") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.orbital_period") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.gravity") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.population") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.climate") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.terrain") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.surface_water") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.residents") }}</th>
                        <th class="px-4 py-2">{{ $t("main.planets.films") }}</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(planet, index) in planets" :key="index">
                        <td class="px-4 py-2">{{ planet.name }}</td>
                        <td class="px-4 py-2">{{ planet.diameter }}</td>
                        <td class="px-4 py-2">{{ planet.rotation_period }}</td>
                        <td class="px-4 py-2">{{ planet.orbital_period }}</td>
                        <td class="px-4 py-2">{{ planet.gravity }}</td>
                        <td class="px-4 py-2">{{ planet.population }}</td>
                        <td class="px-4 py-2">{{ planet.climate }}</td>
                        <td class="px-4 py-2">{{ planet.terrain }}</td>
                        <td class="px-4 py-2">{{ planet.surface_water }}</td>
                        <td class="px-4 py-2">{{ planet.residents.length }}</td>
                        <td class="px-4 py-2">{{ planet.films.length }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-center items-center mt-4">
                <button
                    v-show="nextLink"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    @click="get('planets')"
                >
                    {{ $t("main.load-more") }}
                </button>
            </div>
        </div>
    </BaseLayout>
</template>