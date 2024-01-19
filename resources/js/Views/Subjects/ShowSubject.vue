<template>
    <div class="font-bold text-lg mb-4">Teacher</div>
    <!-- <div class="mb-3">
        <div class="isolate inline-flex rounded-md shadow-sm sm:space-x-3 sm:shadow-none">
          <span class="inline-flex sm:shadow-sm">             
            <button type="button" class="relative -ml-px hidden items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10  sm:inline-flex">
                <svg class="mr-2.5 h-5 w-5 text-gray-400" x-description="Heroicon name: mini/user-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M11 5a3 3 0 11-6 0 3 3 0 016 0zM2.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 018 18a9.953 9.953 0 01-5.385-1.572zM16.25 5.75a.75.75 0 00-1.5 0v2h-2a.75.75 0 000 1.5h2v2a.75.75 0 001.5 0v-2h2a.75.75 0 000-1.5h-2v-2z"></path>
                </svg>
                <RouterLink to="/teachers/create">
                  <span>New</span>
                </RouterLink>   
            </button>
          </span>
        </div>
      </div> -->
    
    <div class="flex flex-col bg-white rounded-lg">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="border rounded-lg divide-y divide-gray-300">
            <div class="py-3 px-4">
              <div class="relative max-w-xs border rounded-lg">
                <label class="sr-only">Search</label>
                <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Search for items">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                  <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </div>
              </div>
            </div>
            <div class="overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-50 ">
                  <tr class="bg-gray-300">
                    <th scope="col" class="px-3 py-3  text-xs text-gray-700 font-medium border uppercase">ID</th>
                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-700 border uppercase">Name</th>
                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-700 border uppercase">Gender</th>
                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-700 border uppercase">Phone</th>
                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-700 border uppercase">Salary</th>
                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-700 border uppercase">Address</th> 
                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-700 border uppercase">Action</th>
                  </tr>
                </thead>
            
                <tbody class="divide-y divide-gray-200 text-center">
                  <tr v-for="teacher in teachers" :key="teacher.id">
                    <td class="px-3 py-3 whitespace-nowrap text-sm border text-gray-800 ">{{teacher.id}}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-sm border text-gray-800 ">{{teacher.name}}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-sm border text-gray-800 ">{{teacher.gender }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-sm border text-gray-800 ">{{teacher.phone}}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-sm border text-gray-800 ">{{teacher.salary }}</td>         
                    <td class="px-6 py-3 whitespace-nowrap text-sm border text-gray-800 ">{{teacher.address}}</td>                                   
                    <td class="px-6 py-3 whitespace-nowrap text-sm border font-medium">
                        <button type="button" class=" mr-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg  text-green-600 hover:text-green-800">
                            <RouterLink :to="{name:'viewstudent',params:{id:teacher.id}}">View</RouterLink>
                        </button>
                        <button type="button" class="mr-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg  text-blue-600 hover:text-blue-800">
                            <RouterLink :to="{name:'editstudent',params:{id:teacher.id}}">Edit</RouterLinK>
                      </button>
                        <button type="button" class=" inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg  text-red-600 hover:text-red-800">
                            <RouterLink to="">Delete</RouterLink>
                        </button>
                    </td>
                  </tr>              
                </tbody>
              </table>
            </div>       
            <div class="py-1 px-4">
              <nav class="flex items-center space-x-1">
                <button type="button" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                  <span aria-hidden="true">«</span>
                  <span class="sr-only">Previous</span>
                </button>
                <button type="button" class="min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10" aria-current="page">1</button>
                <button type="button" class="min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10">2</button>
                <button type="button" class="min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10">3</button>
                <button type="button" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                  <span class="sr-only">Next</span>
                  <span aria-hidden="true">»</span>
                </button>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    </template>
    
    <script>
       export default{
          data(){
            return {
              subjects:[],
              teachers:[],
            }
          },
          mounted(){
            this.getSubject()
          },
          methods:{
            getSubject(){
              axios
                .get(`/api/subjects/${this.$route.params.id}`)
                .then((res)=>{
                  this.teachers = res.data.teachers
                })
                .catch(error=>console.log(error))
                .finally(()=>this.loading = false)
            },
          }    
       }
    </script>