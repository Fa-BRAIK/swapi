<template>
    <div>
        <RouterLink :to="{ name: 'index' }">Home</RouterLink>
        <RouterLink :to="{ name: 'search' }">Search</RouterLink>

        <RouterView></RouterView>
    </div>
</template>