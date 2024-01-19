<template>
<div class="flex w-screen h-screen text-gray-700">
<!-- Component Start -->
<div class="flex flex-col w-56 border-r border-gray-300 bg-gray-700">
    <button class="relative text-sm focus:outline-none group">
        <div class="flex items-center justify-between w-full h-14 px-4 border-b ">
            <span class="font-medium">
               <RouterLink to="#" class="text-white">Admin</RouterLink> 
            </span>
            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="absolute z-10 flex-col items-start hidden w-full pb-1 bg-gray-200 shadow-lg group-focus:flex">
            <a class="w-full px-4 py-2 text-left text-gray-700 hover:bg-orange-800 hover:text-white rounded-md ">Home </a>
            <a class="w-full px-4 py-2 text-left text-gray-700 hover:bg-orange-800 hover:text-white rounded-md" >Create</a>
            <a class="w-full px-4 py-2 text-left text-gray-700 hover:bg-orange-800 hover:text-white rounded-md" >About</a>
        </div>
    </button>
    <div class="flex flex-col flex-grow p-4 overflow-auto">
        <RouterLink to="/" class="flex items-center text-gray-100 hover:text-gray-700 flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300">
            <span class="leading-none">Dashboard</span>
        </RouterLink>
        <RouterLink to="/students" class="flex items-center text-gray-100 hover:text-gray-700 flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300">
            <span class="leading-none">Students</span>
        </RouterLink>
        <RouterLink to="/classroom" class="flex items-center text-gray-100 hover:text-gray-700 flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300">
            <span class="leading-none">Classes</span>
        </RouterLink>
        <RouterLink to="/teachers" class="flex items-center text-gray-100 hover:text-gray-700 flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300">
            <span class="leading-none">Teachers</span>
        </RouterLink>
        <RouterLink to="/subjects" class="flex items-center text-gray-100 hover:text-gray-700 flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300">
            <span class="leading-none">Subjects</span>
        </RouterLink>
       
    </div>

</div>
<div class="flex flex-col flex-grow">
    <div class="flex items-center flex-shrink-0 h-14 px-8 border-b border-gray-300">
        <h1 class="text-lg font-medium">Vue</h1>
        <div class="flex items-center justify-start h-10 px-4 ml-auto text-sm font-medium">
            <RouterLink to="/" class="px-2">Home</RouterLink> 
            <RouterLink to="/about" class="px-2">About</RouterLink> 
            <RouterLink to="/contact" class="px-2">Contact</RouterLink> 
        </div>
        <button class="relative ml-2 text-sm focus:outline-none group">
            <div class="flex items-center justify-between w-10 h-10 rounded hover:bg-gray-300">
                <svg class="w-5 h-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </div>
            <div class="absolute right-0 flex-col items-start hidden w-40 pb-1 bg-white border border-gray-300 shadow-lg group-focus:flex">
                <a class="w-full px-4 py-2 text-left hover:bg-gray-300" href="#">Profile</a>
                <a class="w-full px-4 py-2 text-left hover:bg-gray-300" href="#">Account</a>
                <a class="w-full px-4 py-2 text-left hover:bg-gray-300" href="#">Logout</a>
            </div>
        </button>
    </div>

    <div class="flex-grow p-4 overflow-auto bg-gray-100">
        <RouterView/>
    </div>

</div>
<!-- Component End  -->
</div>

</template>

<script setup>
import { RouterView } from 'vue-router';
</script>