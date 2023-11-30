<template>
    <main class="mainLayout">
        <header>
            <Header />
        </header>
        <article>
            <div></div>
            <slot />
        </article>
    </main>
</template>

<script>
import Header from "../components/Header.vue";

export default {
    name: "MainLayout",
    components: {
        Header,
    },
};
</script>
