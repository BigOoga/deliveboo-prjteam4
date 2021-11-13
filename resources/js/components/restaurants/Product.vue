<template>
    <div class="card m-3 mt-0 shadow" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-4">
                <!-- <img src="{{ asset('storage/' . dish.picture) }}" class="img-fluid rounded-start" alt="{{dish.name}}"> -->
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h5 class="card-title">{{dish.name}}</h5>
                    <p class="card-text m-0">{{dish.description}}</p>
                    <p class="card-text">{{ dish.price + ' €'}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props:['dish'],
        
    }
</script>