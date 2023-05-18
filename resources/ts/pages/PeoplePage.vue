<script lang="ts" setup>
import { onBeforeMount } from "vue";
import BaseLayout from "../layouts/BaseLayout.vue";
import { useList } from "../composables/useList.composable";
import SearchInput from "../components/SearchInput.vue";

const { search, people, nextLink, get, getSearch } = useList();

onBeforeMount(async () => await get("people"));
</script>

<template>
    <BaseLayout>
        <div class="flex flex-col items-center gap-8 justify-center mb-12">
            <h2 class="text-5xl">{{ $t("main.tabs.people") }}</h2>

            <form class="flex" @submit.prevent="getSearch('people')">
                <SearchInput v-model="search" />
            </form>
        </div>

        <div class="max-w-[100%] w-100 overflow-x-auto">
            <table class="w-[100%] text-center">
                <thead>
                    <tr>
                        <th class="px-4 py-2">{{ $t("main.people.name") }}</th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.birth_year") }}
                        </th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.eye_color") }}
                        </th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.gender") }}
                        </th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.hair_color") }}
                        </th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.height") }}
                        </th>
                        <th class="px-4 py-2">{{ $t("main.people.mass") }}</th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.skin_color") }}
                        </th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.homeworld") }}
                        </th>
                        <th class="px-4 py-2">{{ $t("main.people.films") }}</th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.species") }}
                        </th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.starships") }}
                        </th>
                        <th class="px-4 py-2">
                            {{ $t("main.people.vehicles") }}
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(person, index) in people" :key="index">
                        <td class="px-4 py-2">{{ person.name }}</td>
                        <td class="px-4 py-2">{{ person.birth_year }}</td>
                        <td class="px-4 py-2">{{ person.eye_color }}</td>
                        <td class="px-4 py-2">{{ person.gender }}</td>
                        <td class="px-4 py-2">{{ person.hair_color }}</td>
                        <td class="px-4 py-2">{{ person.height }}</td>
                        <td class="px-4 py-2">{{ person.mass }}</td>
                        <td class="px-4 py-2">{{ person.skin_color }}</td>
                        <td class="px-4 py-2">{{ person.homeworld }}</td>
                        <td class="px-4 py-2">{{ person.films.length }}</td>
                        <td class="px-4 py-2">{{ person.species.length }}</td>
                        <td class="px-4 py-2">{{ person.starships.length }}</td>
                        <td class="px-4 py-2">{{ person.vehicles.length }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-center mt-5">
                <button
                    v-show="nextLink"
                    class="bg-blue-600 outline outline-blue-600 text-white px-4 py-1 rounded hover:bg-blue-800 hover:outline-blue-800"
                    @click="get('people')"
                >
                    {{ $t("main.load-more") }}
                </button>
            </div>
        </div>
    </BaseLayout>
</template>
