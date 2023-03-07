<template>
    <PageLayout>
        <Link href="/usuarios" class="mb-5 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700  focus:outline-none focus:text-gray-700">Volver al listado</Link>
        <div class="grid grid-cols-12 gap-3  mt-5">
            <div class="bg-white p-5  col-span-3 flex justify-center flex-col items-center gap-3">
                <img class="h-13 w-13 rounded-full" :src="data.photo" :alt="data.email"/>
                <p class="font-bold">{{ data.name }} {{ data.lastname }}</p>
            </div>
            <div class="col-span-9 bg-white py-5 px-10 flex justify-between" style="grid-column: span 9 / span 9;">
                <div v-for="time in times" :key="time.id" class="flex flex-col justify-center items-center">
                    <span class="text-2xl font-bold uppercase">{{ time.name }}</span>
                    <span class="text-xs text-gray-500">{{ amountTask(time.name) }} Tareas</span>
                </div>
            </div>
        </div>
        
    </PageLayout>
</template>

<script>

import PageLayout from '@/Layouts/PageLayout.vue';
import { Link } from '@inertiajs/vue3';

export default{
    props:['data', 'tasks', 'times'],
    components: {
        PageLayout,
        Link,
    },
    methods:{
        amountTask(time){
            let amount = 0;
            for(let i = 0; i < this.tasks.length; i++){
                if(this.tasks[i].time.name == time){
                    amount++
                }
            }
            return amount;
        }
    }
}
</script>