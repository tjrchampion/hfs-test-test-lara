<template>
  <div class="container mx-auto">
    <h1 class="mb-4 mt-10 text-3xl dark:text-black md:text-5xl lg:text-6xl">
      <span class="font-extrabold text-gray-900 text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">HFS</span>  Blog: {{ post.title }}
    </h1>
 
    <div class="">
      <div class="border-2 border-gray-300 rounded-md p-3 bg-gray-100">
        <p class="text-base leading-6 text-black">
          {{ post.message }}
        </p>
      </div>
    </div>
   </div>
</template>
 
<script setup>
  defineProps({
    post: Object
  });
</script>