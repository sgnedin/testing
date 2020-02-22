    
<template>
    <div class="col mb-4 ">
        <div class="card text-white bg-dark border-dark mb-3">
            <div class="card-header bg-transparent border-info">Название объекта: {{ object.name }}</div>
            <div class="card-body text-white">
                <h5 class="card-title">Инвентарный номер: {{ object.invent_number }}</h5>
                <p class="card-text">Заводской номер: {{ object.zavod_number }}</p>
                <p class="card-text">Дата поставки: {{ object.arrival_date }}</p>
            </div>
            <div class="card-footer bg-transparent border-info">
                <p class="card-text">Кабинет: {{ object.cabinet }}</p>
                <p class="card-text">Этаж: {{ object.floor_id }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'object'
        ],
        mounted() {

        }
    }
</script>
