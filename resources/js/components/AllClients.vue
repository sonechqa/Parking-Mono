<template>
    <table class="va-table">
        <thead>
            <tr>
                <th>Клиент</th>
                <th>Автомобиль</th>
                <th>Государственный номер автомобиля</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="car in cars.data" :key="car.id">
                <td>{{ car.full_name }}</td>
                <td>{{ car.brand }} {{ car.model }}</td>
                <td>{{ car.state_number_RF }}</td>
                <VaButton
                    size="small"
                    class="updateButton"
                    @click="() => updateCarAndClient(car.owner_id)"
                >
                    Редактировать
                </VaButton>
                <VaButton size="small" @click="() => deleteCar(car.id)">
                    Удалить
                </VaButton>
            </tr>
        </tbody>
    </table>
    <VaPagination
        v-model="current_page"
        :pages="Math.round(cars.total / cars.per_page)"
        :visible-pages="3"
        class="justify-center sm:justify-start"
    />
    <!-- Раньше у пагинации были пропы :total="cars.total" и :page-size="cars.per_page", но они
    неправильно отображали номер текущей страницы и ничего не работало, поэтому пришлось схитрить :) -->
</template>

<script>
import { router } from "@inertiajs/vue3";

export default {
    name: "AllClients",
    props: {
        cars: Array,
    },
    data() {
        return {
            current_page: this.cars.current_page,
        };
    },
    watch: {
        current_page() {
            router.get(
                this.cars.links[this.current_page].url,
                // "http://127.0.0.1:8000?page=" + this.current_page,
                {},
                { replace: true }
            );
        },
    },
    methods: {
        deleteCar(id) {
            router.post("/deleteCar", {
                id: id,
            });
        },

        updateCarAndClient(owner_id) {
            router.get("/update", {
                owner_id: owner_id,
            });
        },

        create() {
            router.get("/create");
        },
    },
};
</script>

<style>
.va-table {
    margin: auto;
    margin-top: 50px;
    margin-bottom: 30px;
}

.updateButton {
    margin-right: 10px;
}
</style>
