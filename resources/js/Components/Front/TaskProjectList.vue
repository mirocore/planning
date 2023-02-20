<template>
    <p v-if="tasks.length" class="text-xs flex items-center mt-2">
            Tareas: <span>{{ tasks.length }}</span>
            <svg v-if="!showTasks" @click="toggleShow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer ml-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
            <svg v-else @click="toggleShow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer ml-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
        </p>

    <p v-else class="text-xs">Sin tareas creadas</p>
    
    <div v-if="showTasks && tasks.length" class="grid grid-cols-12 text-xs text-zinc-800 font-semibold ml-4 mt-2">
        <div class="col-span-6">Tarea</div>
        <div class="col-span-3 text-center">Encargado</div>
        <div class="col-span-1 text-center">Tiempo</div>
    </div>

    <ul v-if="showTasks" class="text-xs ml-3 mt-1">
        <li  v-for="task in tasks" :class="task.state ? 'bg-green-200' : '' " :key="task.id" class="grid grid-cols-12 items-center bg-gray-100 mb-1 py-1 px-2 rounded-lg">
            <span class="col-span-6" :class="task.state ? ' text-green-800' : '' ">{{ task.title }} 
                <small class="block text-gray-500">{{ task.description }}</small>
            </span>
            <span class="col-span-3 text-center">{{ task.user.name }} {{ task.user.lastname }}</span>
            <span class="col-span-1 uppercase font-bold text-center">{{ task.time.name }}</span>
            <span class="col-span-2 flex justify-end">
                <svg v-if="task.state" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer fill-green-500" viewBox="0 0 24 24" ><path d="M7 5c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2H7zm0 12V7h10l.002 10H7z"></path><path d="M10.996 12.556 9.7 11.285l-1.4 1.43 2.704 2.647 4.699-4.651-1.406-1.422z"></path></svg>

                <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer fill-red-500" viewBox="0 0 24 24" ><path d="M7 5c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2H7zm0 12V7h10l.002 10H7z"></path></svg>
            </span>
        </li>
    </ul>

</template>

<script>
export default{
    props:['tasks'],
    data(){
        return{
            showTasks: true
        }
    },
    methods:{
        toggleShow(){
            if(this.showTasks){
                this.showTasks = false;
            }else{
                this.showTasks = true;
            }
        }
    }
}
</script>