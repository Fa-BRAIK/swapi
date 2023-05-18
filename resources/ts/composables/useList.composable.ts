import { ref, Ref, computed } from "vue";
import { People } from "../interfaces/people.interface";
import { Planet } from "../interfaces/planet.interface";
import { Starship } from "../interfaces/starships.interface";
import { useRoute, useRouter } from 'vue-router';

export const useList = () => {
    const route = useRoute();
    const router = useRouter();

    const search: Ref<string> = ref(<string>route.query.search ?? '')

    const list: Ref<Array<People|Planet|Starship>> = ref([]);
    const nextLink: Ref<null | string> = ref(null);

    const people: Ref<Array<People>> = computed(() => 
        <Array<People>>list.value
    )

    const planets: Ref<Array<Planet>> = computed(() =>
        <Array<Planet>>list.value
    )

    const starships: Ref<Array<Starship>> = computed(() =>  
        <Array<Starship>>list.value 
    )

    const get = async (
        resource: string
    ) => {
        window.axios
            .get(`/api/${resource}`, {
                params: {
                    page: nextLink.value 
                        ? new URL(nextLink.value).searchParams.get("page") ?? 1
                        : undefined,
                    search: search.value
                },
            })
            .then((response) => {
                list.value = [...list.value, ...response.data?.results ?? []]
    
                nextLink.value = response.data?.next ?? null;
            })
            .catch((error) => {
                console.log(error);
                list.value.length = 0;
            });
    };

    const getSearch = async (
        resource: string,
    ) => {
        await router.push({ name: "people", query: { search: search.value } });
        list.value.length = 0;
        nextLink.value = null;
        await get(resource);
    }

    return {
        people,
        planets,
        starships,
        nextLink,
        search,
        get,
        getSearch
    }
};
