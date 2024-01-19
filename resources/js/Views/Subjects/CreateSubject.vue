<template>
    <div class="bg-gray-50 px-12 py-12 w-[40%] m-auto rounded-md">
    <h2 class="text-xl font-medium mb-4">Subject Form</h2>
    <form @submit.prevent="addStudent">
        <div class="mb-4">
            <label  class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" v-model="subjects.name"
            class="appearance-none border rounded w-full py-3 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" 
                    placeholder="Enter..." required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="date">
                Start Time
            </label>
            <input
                class="appearance-none border rounded w-full py-3 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                type="date" placeholder="Select a date">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="date">
                End Time
            </label>
            <input
                class="appearance-none border rounded w-full py-3 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                type="date" placeholder="Select a date">
        </div>
        <div class="mt-8">
            <button type="submit" class="bg-gray-400 text-gray-200 px-4 py-2 rounded-lg hover:bg-gray-500">Create</button>
        </div>
    </form>
</div>

</template>

<script>
    export default{
        data(){
            return{
                subjects:{

                    'name': '',
                },              
            }
        },
        mounted()
        {
            
        },
        methods: {
           
            addStudent(){
                axios
                    .post(`/api/subjects`,this.subjects)
                    .then((res)=>{
                        this.$router.push({name:'subjects'})
                    })
                    .catch(error =>console.log(error))
                    .finally(()=>this.loading=false)
            },
        },
    }
    
</script>