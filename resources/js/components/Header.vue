<template>
    <div class="header">
        <h1 class="header__title va-h3">
            <a href="/" class="header__link">Автостоянка</a>
        </h1>
    </div>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style>
.header {
    background-color: black;
    padding: 5px;
    text-align: center;
    margin-bottom: 50px;
}

.header__link {
    color: var(--va-text-inverted);
}
</style>
