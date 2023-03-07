<template>
    <div class="bg-white grid grid-cols-12  border-b border-zinc-300 text-xs text-center px-2 py-4 items-center">
        <div class="col-span-4 text-left font-bold">
            <p>{{ data.title }}</p>
            <small class="text-gray-500">{{ data.description }}</small>
        </div>
        <div class="col-span-2 text-gray-500">{{ data.project.name }}</div>
        <div class="col-span-2 text-gray-500">{{ data.product.name }}</div>
        <div class="col-span-2 text-gray-500 uppercase">{{ data.time.name }}</div>
        <div class="col-span-2 text-gray-500 flex justify-end items-center">
            <svg @click="changeState(data)" v-if="data.state" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer fill-green-500" viewBox="0 0 24 24" ><path d="M7 5c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2H7zm0 12V7h10l.002 10H7z"></path><path d="M10.996 12.556 9.7 11.285l-1.4 1.43 2.704 2.647 4.699-4.651-1.406-1.422z"></path></svg>
            <svg @click="changeState(data)" v-else xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer fill-gray-500" viewBox="0 0 24 24" ><path d="M7 5c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2H7zm0 12V7h10l.002 10H7z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer fill-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                    </svg>
        </div>
    </div>
</template>

<script>
export default {
    props:["data"],
    methods:{
        changeState(task){
                this.$inertia.put(`/tareas/estado/${task.id}`, [],{
                    preserveScroll: true,
                    position:"top-right",
                    onSuccess: (page) => {
                        let notifier = new AWN()
                        if(this.data.state === 1){
                            notifier.info("Se ha destildado la tarea", {
                                position:"top-right",
                                icons:{
                                    success: "check-circle",
                                },
                                labels:{
                                    info: "¡Lástima!",
                                },
                                position:"top-right",
                            })
                        }else{
                            notifier.success("Tarea completa", {
                                icons:{
                                    prefix: "<i class='fa fas fa-fw fa-",
                                    success: "check",
                                    suffix: "'></i>",
                                },
                                labels:{
                                    success: "¡Éxito!",
                                }
                            })
                        }
                    },
                }) 
            }
    }    
}    
</script>