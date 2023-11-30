<template>
    <MainLayout>
        <h2 class="update__title">Клиент</h2>
        <VaForm class="update__form">
            <VaInput v-model="Name" label="ФИО" />
            <VaInput v-model="Gender" label="Пол" />
            <VaInput v-model="Phone_number" label="Телефон" />
            <VaInput v-model="Address" label="Адрес" />
            <VaButton
                size="small"
                class="va-button"
                @click="() => updateClient(client.id)"
            >
                Сохранить
            </VaButton>
        </VaForm>
        <UpdateCar v-for="car in cars" :key="car.id" :car="car" />
        {{ cars }}
    </MainLayout>
</template>

<script>
import MainLayout from "../layouts/MainLayout.vue";
import UpdateCar from "../components/UpdateCar.vue";
import { router } from "@inertiajs/vue3";

export default {
    name: "Update",
    components: {
        MainLayout,
        UpdateCar,
    },
    props: {
        client: Object,
        cars: Array,
    },
    data() {
        return {
            Name: this.client.full_name,
            Gender: this.client.gender,
            Phone_number: this.client.phone_number,
            Address: this.client.address,
            // Brand: this.cars[index].brand,
            // Model: this.cars[index].model,
            // Body_color: this.cars[index].body_color,
            // State_number_RF: this.cars[index].state_number_RF,
            // Status: this.cars[index].status,
        };
    },
    methods: {
        updateClient(id) {
            router.post("/updateClient", {
                id: id,
                Name: this.Name,
                Gender: this.Gender,
                Phone_number: this.Phone_number,
                Address: this.Address,
            });
        },
    },
};
</script>

<style>
.update__title {
    margin-top: 20px;
    margin-left: 20px;
}

.update__form {
    margin-left: 50px;
    display: flex;
    flex-direction: column;
}

.va-button {
    width: 150px;
    margin-top: 10px;
}
</style>
