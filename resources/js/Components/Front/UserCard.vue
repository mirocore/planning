<template>
    <div class="bg-white mb-2 py-1 px-2 rounded-xl grid grid-cols-12 items-center">
        <div class="col-span-3 text-zinc-900 font-bold text-xs flex items-center gap-3">
            <img class="h-8 w-8 rounded-full" :src="data.photo" :alt="data.email"/>
            <span>{{ data.name }} {{ data.lastname }}</span>
        </div>
        <div class="col-span-3 text-zinc-500 text-xs">{{ data.position }}</div>
        <div class="col-span-3 text-zinc-500 text-xs">0 Tareas</div>
        <div class="col-span-3 text-zinc-500 text-xs flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
            </svg>


        </div>
    </div>
</template>

<script>
    export default{
        props:{
            data: Object
        }
    }
</script>