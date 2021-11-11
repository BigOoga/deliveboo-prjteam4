<template>
    <div class="container-fluid">
        <div class="row">
            <h4>This is the sidebar component :)</h4>
        </div>
        <div class="row">Order by (menù dropdown):</div>
        <div class="row">
            Regimi alimentari:
            <div>
                <ul>
                    <li>gluten free</li>
                    <li>surgelato</li>
                    <li>vegano</li>
                    <li>vegetariano</li>
                </ul>
            </div>
        </div>
        <div class="row">
            Categorie:
            <div>
                <ul>
                    <li>sushi</li>
                    <li>pizza</li>
                    <li>pesce</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
