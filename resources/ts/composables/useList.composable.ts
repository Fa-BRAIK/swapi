import { ref, Ref, computed } from "vue";
import { People } from "../interfaces/people.interface";
import { Planet } from "../interfaces/planet.interface";
import { Starship } from "../interfaces/starships.interface";

export const useList = () => {
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
                        : undefined
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

    return {
        people,
        planets,
        starships,
        nextLink,
        get
    }
};
