<template>
    <VaForm class="update__form">
        <VaInput v-model="Name" label="ФИО" />
        <VaInput v-model="Gender" label="Пол" />
        <VaInput v-model="Phone_number" label="Телефон" />
        <VaInput v-model="Address" label="Адрес" />
        <VaButton
            size="small"
            class="saveButton"
            @click="
                $emit('clientSaved', {
                    id: client.id,
                    full_name: Name,
                    gender: Gender,
                    phone_number: Phone_number,
                    address: Address,
                })
            "
        >
            Сохранить
        </VaButton>
    </VaForm>
</template>

<script>
export default {
    name: "Client",
    props: {
        client: Object,
    },
    data() {
        return {
            Name: this.client.full_name,
            Gender: this.client.gender,
            Phone_number: this.client.phone_number,
            Address: this.client.address,
        };
    },
};
</script>

<style>
.saveButton {
    width: 150px;
    margin-top: 10px;
}
</style>
