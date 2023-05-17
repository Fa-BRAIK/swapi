<template>
    <div>
        <header>
            <h1>
                <RouterLink :to="{ name: 'index' }">
                    {{ $t("main.swapi") }}
                </RouterLink>
            </h1>

            <nav>
                <ul>
                    <li>
                        <RouterLink :to="{ name: 'people' }">
                            {{ $t("main.tabs.planets") }}
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

        <slot />
    </div>
</template>
