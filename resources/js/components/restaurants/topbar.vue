<template>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand d-flex align-items-center" href="/home"
            ><img
                src="/images/logo-small.png "
                width="40"
                height="40"
                class="d-inline-block align-top"
                alt="Logo"
            />
            <strong class="mx-1 text-logo">Deliveboo</strong>
        </a>
    </nav>
</template>

<script>
export default {
    name: "Topbar",
};
</script>
<style lang="scss" scoped>
nav {
    padding: 10px 40px;
    height: 90px;
    background-color: rgba(0, 204, 188, 1);
}
</style>
