<template>
    <MainLayout>
        <h1 class="title va-h3">Все машины</h1>
        <AllClients :cars="cars" />
        <VaButton size="medium" class="createButton" @click="() => create()">
            Создать новую запись
        </VaButton>
    </MainLayout>
</template>

<script>
import MainLayout from "../layouts/MainLayout.vue";
import AllClients from "../components/AllClients.vue";
import { router } from "@inertiajs/vue3";

export default {
    name: "Home",
    components: {
        MainLayout,
        AllClients,
    },
    props: {
        cars: Array,
    },
    methods: {
        create() {
            router.get("/create");
        },
    },
};
</script>

<style>
.title {
    text-align: center;
}
.createButton {
    margin-left: 200px;
}
</style>
