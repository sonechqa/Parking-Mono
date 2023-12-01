<template>
    <MainLayout>
        <div class="create">
            <h1 class="create__title va-h4">Создание нового клиента</h1>
            <h2 class="create__title__client va-h6">Клиент</h2>
            <Client
                :client="{}"
                @client-saved="(client) => saveClient(client)"
            />
            <h2 class="create__title__car va-h6">Автомобиль</h2>
            <Car
                v-for="(car, index) in cars"
                :key="index"
                :car="{}"
                @car-saved="(car) => saveCar(car)"
            />
            <VaButton
                icon="add"
                icon-color="#ffffff"
                class="mr-3 mb-2 add-icon"
                @click="addCar"
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
    name: "Create",
    components: {
        MainLayout,
        Car,
        Client,
    },
    data() {
        return {
            Name: "",
            Gender: "",
            Phone_number: "",
            Address: "",
            cars: [{}],
        };
    },
    methods: {
        saveClient(client) {
            router.post("/saveClient", client);
        },

        saveCar(car) {
            router.post("/saveCar", car);
        },
        addCar() {
            this.cars.push({});
        },
    },
};
</script>

<style>
.create {
    margin-left: 100px;
}

.create__title {
    text-align: center;
}

.create__form {
    width: 50%;
    margin-left: 50px;
    display: flex;
    flex-direction: column;
}

.add-icon {
    margin-left: 50px;
    width: 100px;
    margin-top: 10px;
}
</style>
