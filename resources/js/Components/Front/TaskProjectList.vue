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


            <!-- ESTADO -->
            <span class="col-span-2 flex justify-end items-center">
                <svg @click="changeState(task)" v-if="task.state" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer fill-green-500" viewBox="0 0 24 24" ><path d="M7 5c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2H7zm0 12V7h10l.002 10H7z"></path><path d="M10.996 12.556 9.7 11.285l-1.4 1.43 2.704 2.647 4.699-4.651-1.406-1.422z"></path></svg>

                <svg @click="changeState(task)" v-else xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer fill-gray-500" viewBox="0 0 24 24" ><path d="M7 5c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2H7zm0 12V7h10l.002 10H7z"></path></svg>

                <Dropdown>
                <template v-slot:trigger>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer fill-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                    </svg>
                </template>
                <template v-slot:content>
                    <ul class="bg-gray-300 py-0">
                        <li class="text-xs p-3 hover:bg-gray-500 transition-all cursor-pointer hover:text-white flex gap-1">
                            <Link class="flex gap-1 w-full" :href="`/`">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                Editar
                            </Link>
                        </li>
                        <li @click="deleteTask(task.id)" class="text-xs p-3 hover:bg-gray-500 transition-all cursor-pointer hover:text-white flex gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>

                            Borrar
                        </li>
                    </ul>
                </template>
            </Dropdown>
            </span>
        </li>
    </ul>

</template>

<script>
import Dropdown from "@/Components/Dropdown.vue";

export default{
    props:['tasks'],
    data(){
        return{
            showTasks: true
        }
    },
    components:{
        Dropdown
    },
    methods:{
        toggleShow(){
            if(this.showTasks){
                this.showTasks = false;
            }else{
                this.showTasks = true;
            }
        },
        changeState(task){
            this.$inertia.put(`/tareas/estado/${task.id}`)
        },
        
        deleteTask(id){
           this.$inertia.delete(`/tareas/${id}`); 
        }
    }
}
</script>