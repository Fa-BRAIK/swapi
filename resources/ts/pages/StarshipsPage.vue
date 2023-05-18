<script lang="ts" setup>
import { onBeforeMount } from "vue";
import BaseLayout from "../layouts/BaseLayout.vue";
import { useList } from "../composables/useList.composable";

const { starships, nextLink, get } = useList();

onBeforeMount(async () => await get("starships"));
</script>

<template>
    <BaseLayout>
        <div class="flex flex-col items-center gap-8 justify-center mb-12">
            <h2 class="text-5xl">{{ $t("main.tabs.starships") }}</h2>
        </div>

        <div class="max-w-[100%] w-100 overflow-x-auto">
            <table class="w-[100%] text-center">
                <thead>
                    <th class="px-4 py-2">{{ $t("main.starships.name") }}</th>
                    <th class="px-4 py-2">{{ $t("main.starships.model") }}</th>
                    <th class="px-4 py-2">
                        {{ $t("main.starships.manufacturer") }}
                    </th>
                    <th class="px-4 py-2">
                        {{ $t("main.starships.cost_in_credits") }}
                    </th>
                    <th class="px-4 py-2">{{ $t("main.starships.length") }}</th>
                    <th class="px-4 py-2">
                        {{ $t("main.starships.max_atmosphering_speed") }}
                    </th>
                    <th class="px-4 py-2">{{ $t("main.starships.crew") }}</th>
                    <th class="px-4 py-2">
                        {{ $t("main.starships.passengers") }}
                    </th>
                    <th class="px-4 py-2">
                        {{ $t("main.starships.cargo_capacity") }}
                    </th>
                    <th class="px-4 py-2">
                        {{ $t("main.starships.consumables") }}
                    </th>
                    <th class="px-4 py-2">
                        {{ $t("main.starships.hyperdrive_rating") }}
                    </th>
                    <th class="px-4 py-2">{{ $t("main.starships.mglt") }}</th>
                    <th class="px-4 py-2">
                        {{ $t("main.starships.starship_class") }}
                    </th>
                    <th class="px-4 py-2">{{ $t("main.starships.pilots") }}</th>
                    <th class="px-4 py-2">{{ $t("main.starships.films") }}</th>
                </thead>

                <tbody>
                    <tr v-for="(starship, index) in starships" :key="index">
                        <td class="px-4 py-2">{{ starship.name }}</td>
                        <td class="px-4 py-2">{{ starship.model }}</td>
                        <td class="px-4 py-2">{{ starship.manufacturer }}</td>
                        <td class="px-4 py-2">
                            {{ starship.cost_in_credits }}
                        </td>
                        <td class="px-4 py-2">{{ starship.length }}</td>
                        <td class="px-4 py-2">
                            {{ starship.max_atmosphering_speed }}
                        </td>
                        <td class="px-4 py-2">{{ starship.crew }}</td>
                        <td class="px-4 py-2">{{ starship.passengers }}</td>
                        <td class="px-4 py-2">{{ starship.cargo_capacity }}</td>
                        <td class="px-4 py-2">{{ starship.consumables }}</td>
                        <td class="px-4 py-2">
                            {{ starship.hyperdrive_rating }}
                        </td>
                        <td class="px-4 py-2">{{ starship.mglt }}</td>
                        <td class="px-4 py-2">{{ starship.starship_class }}</td>
                        <td class="px-4 py-2">{{ starship.pilots.length }}</td>
                        <td class="px-4 py-2">{{ starship.films.length }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-center items-center mt-4">
                <button
                    v-if="nextLink"
                    @click="get('starships')"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    {{ $t("main.load-more") }}
                </button>
            </div>
        </div>
    </BaseLayout>
</template>
