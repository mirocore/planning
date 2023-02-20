<template>
    <div class="mb-5 bg-slate-300 p-4 rounded-lg">
        <div class="flex justify-between items-center">
            <p class="text-xs text-zinc-600 mb-3">Creado: <span class="text-zinc-700 font-semibold">{{ project.creado }}</span></p>
            <p class="text-xs text-zinc-600 mb-3">{{ project.product.name }}</p>
        </div>
        <p class="font-bold ">{{ project.name }}</p>

        <TaskProjectList 
            :tasks="project.tasks"
        />

    </div>
</template>

<script>
import TaskProjectList from './TaskProjectList.vue'

export default {
    props:['project'],
    components:{
        TaskProjectList
    }
}

</script>