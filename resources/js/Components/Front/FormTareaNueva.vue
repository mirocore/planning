<template>

    <div class="mb-3 flex justify-between items-center">
        <div>
            <p class="text-md font-bold text-gray-700">Crear Tarea nueva</p>
            <p class="text-xs text-gray-400">Proyecto:{{ projectName }}</p>
        </div>

        <svg @click="closeModal" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 hover:w-5 hover:h-5 transition-all cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>

    <form @submit.prevent="crearTarea" class="flex flex-col gap-3">       
            <div class="">
                <label for="title" class="text-xs text-gray-500">Titulo</label>
                <input 
                    type="text"
                    id="title"
                    v-model="newTask.title"
                    class="w-full text-gray-500 .placeholder-gray-500::placeholder text-xs border-gray-300"
                    placeholder="Ingrese título de la tarea"
                />
            </div>

            <div>
                <label class="text-xs text-gray-500" for="description">Descripción</label>
                <textarea id="description" v-model="newTask.description" class="w-full text-gray-500 .placeholder-gray-500::placeholder text-xs border-gray-300 resize-none">
                </textarea>
            </div>
            
            <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="text-xs text-gray-500 block" for="id_user">Encargado</label>
                        <select class="w-full text-xs mt-1 text-gray-500 border-gray-400" id="id_user" v-model="newTask.id_user">
                            <option value="0">Seleccione Empleado</option>
                            <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }} {{ user.lastname }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 block" for="id_time">Tiempo</label>
                        <select v-model="newTask.id_time" id="id_time" class="w-full text-xs mt-1 text-gray-500 border-gray-400 uppercase">
                            <option v-for="time in times" :key="time.id" class="uppercase" :value="time.id" >{{ time.name }}</option>
                        </select>
                    </div>

            </div>
                
        <button class="font-bold text-white bg-sky-600 hover:bg-sky-900 transition-all text-xs py-3 w-full mt-3">Crear Tarea Nueva</button>

    </form>
</template>

<script>
export default{
    props:['projectName', 'projectId', 'toggleModal', 'users', 'times'],
    methods:{
        closeModal(){
            this.toggleModal();
        },
        crearTarea(){
           // TODO VALIDACION
           
           // AGREGO EL ID DEL PROYECTO
           this.newTask.id_project = this.projectId;

           // CIERRO EL MODAL
           this.closeModal();

           // MANDO REGISTRO
           this.$inertia.post('/tareas', this.newTask);

           
        }
    },
    data(){
        return{
            newTask:{
                title: 'Tarea Nueva LALALALA',
                description: 'Esta es una descripción corta',
                id_user: 2,
                id_time: 2,
                id_state: 0,
                id_project: null
            }
        }
    }
}
</script>