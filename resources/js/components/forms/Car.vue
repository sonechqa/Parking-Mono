<template>
    <VaForm class="update__form">
        <VaInput v-model="Brand" label="Модель" />
        <VaInput v-model="Model" label="Марка" />
        <VaInput v-model="Body_color" label="Цвет кузова" />
        <VaInput v-model="State_number_RF" label="Номер" />
        <VaInput v-model="Status" label="На стоянке или нет" />
        <SelectOwner :car="car" @owner-selected="(owner) => saveOwner(owner)" />
        <VaButton
            size="small"
            class="saveButton"
            @click="
                $emit('carSaved', {
                    id: car.id,
                    brand: Brand,
                    model: Model,
                    body_color: Body_color,
                    state_number_RF: State_number_RF,
                    status: Status,
                    owner: Owner,
                })
            "
        >
            Сохранить
        </VaButton>
    </VaForm>
</template>

<script>
import SelectOwner from "../SelectOwner.vue";

export default {
    name: "Car",
    components: {
        SelectOwner,
    },
    props: {
        car: Object,
    },
    data() {
        return {
            Brand: this.car.brand,
            Model: this.car.model,
            Body_color: this.car.body_color,
            State_number_RF: this.car.state_number_RF,
            Status: this.car.status === 1 ? "Да" : "Нет",
            Owner: this.car.full_name,
        };
    },
    methods: {
        saveOwner(owner) {
            this.Owner = owner;
        },
    },
};
</script>

<style>
.saveButton {
    width: 150px;
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>
