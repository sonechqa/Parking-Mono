<template>
    <VaSelect
        v-model="value"
        :search="search"
        label="Владелец"
        :options="suggestedClients"
        searchable
        highlight-matched-text
        @update:search="getSuggestedClients"
        @update:modelValue="$emit('ownerSelected', { owner: value })"
    />
</template>

<script>
import axios from "axios";

export default {
    name: "Select",
    props: {
        car: Object,
    },
    data() {
        return {
            value: this.car.full_name || "",
            search: "",
            suggestedClients: [],
        };
    },
    methods: {
        getSuggestedClients(search) {
            this.search = search;
            axios
                .post("/clients", {
                    input: search,
                })
                .then((res) => {
                    this.suggestedClients = res.data.map((client) => {
                        return client.full_name;
                    });
                    if (this.search === "") {
                        this.suggestedClients = [];
                    }
                });
        },
    },
};
</script>
