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

    <form class="flex flex-col gap-3">       
            <div class="">
                <label class="text-xs text-gray-500">Titulo</label>
                <input 
                    type="text"
                    class="w-full text-gray-500 .placeholder-gray-500::placeholder text-xs border-gray-300"
                    placeholder="Ingrese título de la tarea"
                />
            </div>

            <div>
                <label class="text-xs text-gray-500">Descripción</label>
                <textarea class="w-full text-gray-500 .placeholder-gray-500::placeholder text-xs border-gray-300 resize-none">
                </textarea>
            </div>
            
            <div class="grid grid-cols-3 gap-5">
                    <div>
                        <label class="text-xs text-gray-500 block">Encargado</label>
                        <select class="w-full text-xs mt-1 text-gray-500 border-gray-400">
                            <option value="0">Seleccione Empleado</option>
                            <option v-for="user in users" :key="user.id">{{ user.name }} {{ user.lastname }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 block">Tiempo</label>
                        <select class="w-full text-xs mt-1 text-gray-500 border-gray-400 uppercase">
                            <option v-for="time in times" :key="time.id" class="uppercase">{{ time.name }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 block">Estado</label>
                        <select class="w-full text-xs mt-1 text-gray-500 border-gray-400 capitalize">
                            <option v-for="state in states" class="capitalize" :key="state.id">{{ state.name }}</option>
                        </select>
                    </div>
            </div>
                
        <button class="font-bold text-white bg-sky-600 hover:bg-sky-900 transition-all text-xs py-3 w-full mt-3">Crear Tarea Nueva</button>

    </form>
</template>

<script>
export default{
    props:['projectName', 'toggleModal','states', 'users', 'times'],
    methods:{
        closeModal(){
            this.toggleModal();
        }
    }
}
</script>