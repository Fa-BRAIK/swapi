<script lang="ts" setup>
import { computed } from "vue";

const props = defineProps<{
    modelValue: string
}>()

const emit = defineEmits(['update:modelValue'])

const search = computed({
    get: () => props.modelValue,
    set: (value: string) => emit('update:modelValue', value),
});
</script>

<template>
    <label for="search" class="flex flex-col">
        {{ $t("main.search") }}

        <div class="flex">
            <input
                type="text"
                name="search"
                class="min-w-[250px] w-[50vw] h-8 rounded-l outline px-2"
                :placeholder="$t('main.search-for-a-person')"
                v-model="search"
            />

            <button
                type="submit"
                class="bg-blue-600 outline outline-blue-600 text-white px-4 py-0 rounded-r hover:bg-blue-800 hover:outline-blue-800"
            >
                {{ $t("main.go") }}
            </button>
        </div>
    </label>
</template>