<template>
    <div class="mb-5 p-4 rounded-lg" :class="colorFondo">
        <div class="flex justify-between items-center">
            <p class="text-xs text-zinc-600">Creado: <span class="text-zinc-700 font-semibold">{{ project.creado }}</span></p>
            <small class="text-xs text-zinc-600">{{ project.product.name }}</small>
            <Dropdown>
                <template v-slot:trigger>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                    </svg>
                </template>
                <template v-slot:content>
                    <ul class="bg-gray-300 py-0 ">
                        <li class="text-xs p-3 hover:bg-gray-500 transition-all cursor-pointer hover:text-white flex gap-1">
                            <Link  class="flex gap-1 w-full" :href="`/proyectos/edit/${project.id}`">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                Editar
                            </Link>
                        </li>
                        <li @click="deleteProject(project.id)" class="text-xs p-3 hover:bg-gray-500 transition-all cursor-pointer hover:text-white flex gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>

                            Borrar
                        </li>
                    </ul>
                </template>
            </Dropdown>
        </div>
        <p class="font-bold mt-3">{{ project.name }} </p>
        <p class="text-xs text-zinc-600 mb-3 capitalize"><span class="font-bold">Estado: </span>{{ project.state.name }}</p>
        
        <Modal :show="showModal" @close="toggleModal">
            <FormTareaNueva 
                :projectName="project.name"
                :projectId="project.id"
                :close="toggleModal"
                :toggleModal="toggleModal"
                :times="times"
                :users="users"
            />
        </Modal>

        <button v-if="project.id_state != 4 && project.id_state != 2" @click="toggleModal" class="text-xs bg-blue-800 text-white hover:bg-blue-900 py-1 px-2 transition-all mb-2" >Tarea Nueva</button>
        <TaskProjectList 
            :tasks="project.tasks"
            closeable="true"
            :projectName="project.name"
            :projectId="project.id"
            :times="times"
            :users="users"
        />

    </div>
</template>

<script>
import TaskProjectList from './TaskProjectList.vue';
import Dropdown from "@/Components/Dropdown.vue";
import Modal from "@/Components/Modal.vue";
import FormTareaNueva from "@/Components/Front/FormTareaNueva.vue";
import { Link } from '@inertiajs/vue3';
import AWN from "awesome-notifications";


export default {
    props:['project', 'states', 'users', 'times'],
    computed:{
        colorFondo(){
            switch(this.project.id_state){
                case 1:
                    return "bg-indigo-400";
                case 2:
                    return "bg-red-300";
                case 3:
                    return "bg-slate-300";
                case 4:
                    return "bg-green-300";
                default:
                    return "bg-slate-300"
            }
        }
    },
    components:{
        TaskProjectList,
        Dropdown,
        Link,
        Modal,
        FormTareaNueva
    },
    data(){
        return{
            showModal: false
        }
    },
    methods:{
        deleteProject(id){

            let notifier = new AWN();
            let onOk = () => 
            {
                this.$inertia.delete(`/proyectos/${id}`, 
                    {
                        preserveScroll: true,
                        position:"top-right",
                        onSuccess: (page) => {notifier.success("Proyecto eliminado")}
                    }
                )
            };
            let onCancel = () => {};
            notifier.confirm(
                '??sta tarea no tiene vuelta atr??s',
                onOk,
                onCancel,
                {
                labels: {
                    confirm: '??Est??s seguro?'
                }
                }
            )

            
        },
        toggleModal(){
            this.showModal = !this.showModal;
        },
    }
}

</script>