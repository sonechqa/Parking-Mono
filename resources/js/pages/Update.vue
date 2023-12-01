<template>
    <MainLayout>
        <div class="update">
            <h1 class="create__title va-h4">Редактирование данных</h1>
            <h2 class="update__title va-h6">Клиент</h2>
            <Client
                :client="client"
                @client-saved="(client) => updateClient(client)"
            />
            <h2 class="update__title va-h6">Автомобили</h2>
            <Car
                v-for="car in cars"
                :key="car.id"
                :car="car"
                @car-saved="(car) => updateCar(car)"
            />
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "../layouts/MainLayout.vue";
import Car from "../components/forms/Car.vue";
import Client from "../components/forms/Client.vue";
import { router } from "@inertiajs/vue3";

export default {
    name: "Update",
    components: {
        MainLayout,
        Client,
        Car,
    },
    props: {
        client: Object,
        cars: Array,
    },
    methods: {
        updateClient(client) {
            router.post("/updateClient", client);
        },

        updateCar(car) {
            router.post("/updateCar", car);
        },
    },
};
</script>

<style>
.update {
    margin-left: 100px;
}

.update__title {
    margin-top: 20px;
    margin-left: 20px;
}

.update__form {
    margin-left: 50px;
    display: flex;
    flex-direction: column;
    width: 50%;
}
</style>
