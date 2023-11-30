<template>
    <h2 class="update__title">Автомобили</h2>
    <VaForm class="update__form">
        <VaInput v-model="Brand" label="Модель" />
        <VaInput v-model="Model" label="Марка" />
        <VaInput v-model="Body_color" label="Цвет кузова" />
        <VaInput v-model="State_number_RF" label="Номер" />
        <VaInput v-model="Status" label="На стоянке или нет" />
        <VaButton
            size="small"
            class="va-button"
            @click="() => updateCar(index)"
        >
            Сохранить
        </VaButton>
    </VaForm>
</template>

<script>
export default {
    name: "UpdateCar",
    props: {
        car: Object,
    },
    data() {
        return {
            Brand: this.car.brand,
            Model: this.car.model,
            Body_color: this.car.body_color,
            State_number_RF: this.car.state_number_RF,
            Status: this.car.status,
        };
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
