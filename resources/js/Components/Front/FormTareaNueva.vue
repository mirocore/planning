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
                    :class="$page.props.errors.title ? 'border-2 border-red-400' : '' "
                    class="w-full text-gray-500 .placeholder-gray-500::placeholder text-xs border-gray-300"
                    placeholder="Ingrese título de la tarea"
                />
                <div class="mt-1 text-xs bg-red-300 text-red-900 px-4 py-2" v-if="$page.props.errors.title">{{ $page.props.errors.title }}</div>
            </div>

            <div>
                <label class="text-xs text-gray-500" for="description">Descripción</label>
                <textarea id="description" v-model="newTask.description" class="w-full text-gray-500 .placeholder-gray-500::placeholder text-xs border-gray-300 resize-none">
                </textarea>
            </div>
            
            <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="text-xs text-gray-500 block" for="id_user">Encargado</label>
                        <select :class="$page.props.errors.id_user ? 'border-2 border-red-400' : '' " class="w-full text-xs mt-1 text-gray-500 border-gray-400" id="id_user" v-model="newTask.id_user">
                            <option value="">Seleccione Empleado</option>
                            <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }} {{ user.lastname }}</option>
                        </select>
                        <div class="mt-1 text-xs bg-red-300 text-red-900 px-4 py-2" v-if="$page.props.errors.id_user">{{ $page.props.errors.id_user }}</div>

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
import AWN from "awesome-notifications";

export default{
    props:['projectName', 'projectId', 'toggleModal', 'users', 'times'],
    methods:{
        closeModal(){
            this.toggleModal();
        },
        crearTarea(){
           // AGREGO EL ID DEL PROYECTO
           this.newTask.id_project = this.projectId;

           // MANDO REGISTRO
           this.$inertia.post('/tareas', this.newTask, 
           {
               preserveScroll: true,
               onSuccess: (page) => {
                   // CIERRO EL MODAL
                   this.closeModal();

                   let notifier = new AWN()
                   
                   notifier.success("Tarea creada", {
                       position:"top-right",
                       icons:{
                            success: "check-circle",
                        },
                        labels:{
                            success: "¡Éxito!",
                        }
                    })
                },
                /* onError: (page) => {
                    let notifier = new AWN();
                    notifier.alert("No pudo crearse la tarea. Revisar errores"), {
                        position:"top-right",
                        icons:{
                            alert: "exclamation"
                        },
                        labels:{
                            alert:"¡Hubo un error!"
                        }
                    }
                } */
            }
           );

           
        }
    },
    data(){
        return{
            newTask:{
                title: '',
                description: '',
                id_user: "",
                id_time: 1,
                id_state: 0,
                id_project: null
            }
        }
    }
}
</script>