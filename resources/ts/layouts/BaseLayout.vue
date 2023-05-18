<template>
    <header
        class="w-100 flex flex-col justify-center items-center text-center md:flex-row md:text-left px-8 sm:px-16 md:px-32 lg:px-64 xl:px-[32rem] py-4 shadow-sm"
    >
        <h1 class="text-3xl flex-grow mb-4 md:mb-0">
            <RouterLink :to="{ name: 'index' }">
                {{ $t("main.swapi") }}
            </RouterLink>
        </h1>

        <nav>
            <ul class="flex gap-6">
                <li>
                    <RouterLink :to="{ name: 'people' }">
                        {{ $t("main.tabs.people") }}
                    </RouterLink>
                </li>

                <li>
                    <RouterLink :to="{ name: 'starships' }">
                        {{ $t("main.tabs.starships") }}
                    </RouterLink>
                </li>

                <li>
                    <RouterLink :to="{ name: 'planets' }">
                        {{ $t("main.tabs.planets") }}
                    </RouterLink>
                </li>
            </ul>
        </nav>
    </header>

    <div class="pt-4 px-8 sm:px-16 md:px-32 lg:px-64 xl:px-[32rem]">
        <slot />
    </div>
</template>
