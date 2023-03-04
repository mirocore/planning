<template>

    <div class="mb-3 flex justify-between items-center">
        <div>
            <p class="text-md font-bold text-gray-700">Editar Tarea</p>
            <p class="text-xs text-gray-400">Proyecto:{{ projectName }}</p>
        </div>

        <svg @click="closeModal" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4  hover:w-5 hover:h-5 transition-all cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>

    <form @submit.prevent="editTask" class="flex flex-col gap-3">       
            <div class="">
                <label for="title" class="text-xs text-gray-500">Titulo</label>
                <input 
                    type="text"
                    id="title"
                    v-model="task.title"
                    class="w-full text-gray-500 .placeholder-gray-500::placeholder text-xs border-gray-300"
                    placeholder="Ingrese título de la tarea"
                />
            </div>

            <div>
                <label class="text-xs text-gray-500" for="description">Descripción</label>
                <textarea id="description" v-model="task.description" class="w-full text-gray-500 .placeholder-gray-500::placeholder text-xs border-gray-300 resize-none">
                </textarea>
            </div>
            
            <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="text-xs text-gray-500 block" for="id_user">Encargado</label>
                        <select class="w-full text-xs mt-1 text-gray-500 border-gray-400" id="id_user" v-model="task.id_user">
                            <option value="0">Seleccione Empleado</option>
                            <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }} {{ user.lastname }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 block" for="id_time">Tiempo</label>
                        <select v-model="task.id_time" id="id_time" class="w-full text-xs mt-1 text-gray-500 border-gray-400 uppercase">
                            <option v-for="time in times" :key="time.id" class="uppercase" :value="time.id" >{{ time.name }}</option>
                        </select>
                    </div>

            </div>
                
        <button class="font-bold text-white bg-sky-600 hover:bg-sky-900 transition-all text-xs py-3 w-full mt-3">Editar Tarea Nueva</button>

    </form>
</template>

<script>
import AWN from "awesome-notifications";

export default{
    props:['projectName', 'projectId', 'users', 'times', 'task', 'toggleModal'],
    methods:{
        closeModal(){
            this.toggleModal();
        },
        editTask(){
           // TODO VALIDACION
           
           // CIERRO EL MODAL
           this.closeModal();

           // MANDO REGISTRO
           this.$inertia.put(`/tareas/${this.task.id}`, this.task, {
                preserveScroll: true,
                onSuccess: page => {
                    let notifier = new AWN()
                    notifier.success("Tarea editada", {
                       label:{success: "¡Éxito!"} 
                    });
                } //FIN DEL ON SUCCESS
           } // FIN DE LOS OPTIONS
           ); // FIN DE INERTIA PUT

           
        }
    },
    data(){
        return{
            showModal:false,
        }
    },
}
</script>