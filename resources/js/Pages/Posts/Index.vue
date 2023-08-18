<template>
  <div class="container mx-auto">
    <h1 class="flex mb-4 mt-10 text-3xl dark:text-black md:text-5xl lg:text-6xl">
      <span class="font-extrabold text-gray-900 text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">HFS</span>Blog
      <Link v-if="!$page.props.auth.user" href="/login" class="border border-transparent rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out">Login</Link>
    </h1>

      <form v-on:submit.prevent="submitForm" v-if="$page.props.auth.user">
        <div class="mb-2 mb-2">
          <label for="postTile">Post title</label>
          <TextInput
            type="text"
            id="postTile" 
            v-model="form.title" 
            class="border w-full rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out" 
          />
          <div v-if="form.errors.title" class="text-red-500">{{ form.errors.title }}</div>
        </div>

        <div class="mb-2 mb-2">
          <InputLabel for="postBody" value="What would you like to say?" />
          <textarea 
            id="postBody"
            class="border w-full rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out" 
            rows="5"
            v-model="form.body"
          ></textarea>
          <div v-if="form.errors.body" class="text-red-500">{{ form.errors.body }}</div>  
        </div>

        <button type="submit" class="border border-transparent rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out">Create post</button>
      </form>

      <hr class="mt-5 mb-5 border-b-4 border-indigo-500 " />

    <InputLabel for="search" value="Search a post" />
    <TextInput
      id="search"
      :v-model="search"
      @keyup="throttleSeatchPosts"
      type="email"
      class="mt-1 mb-5 block w-full"
      autofocus
      autocomplete="search"
      placeholder="Search for a post.."
    />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="border-2 border-gray-300 rounded-md p-3 bg-gray-100" v-for="post in posts.data"  :key="post.id">
        <h2 class="text-2xl font-extrabold dark:text-black">{{ post.title }}</h2>
        <p class="mt-4 text-base leading-6 text-black">
          {{ post.body }}
          <small class="text-grey:500"> Posted by <strong>{{ post.post_user }} {{ post.created_at }}</strong></small>
        </p>

        <Link :href="`/post/${post.slug}`" class="mt-8 border border-transparent rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out">View blog post</Link>
      </div>

      <p v-if="posts.data.length < 1">No blog posts with this search criteria...</p>
    </div>
    

    <div class="flex flex-wrap mb-1 pt-5">
      <template v-for="(link, key) in posts.links">
          <div v-if="link.url === null" :key="key" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
          <Link
            v-else
            :key="link.label" 
            :href="link.url" 
            v-html="link.label"  
            class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" 
            :class="{ 'bg-white': link.active }"
          />       
        </template>
      </div>  


  </div>
</template>

<script setup>
  import throttle from 'lodash/throttle';
  import { useForm, Link, router } from '@inertiajs/vue3';
  import TextInput from '@/Components/TextInput.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  
  const form  = useForm({
    title: '',
    body: '',
  });

  const props = defineProps({
    posts: Object,
    search: String,
  });

  const submitForm = () => {
    form.post(route('posts.store'), {
      preserveScroll: true,
      onSuccess: () => {
        form.reset();
      }
    });
  }

  const throttleSeatchPosts = throttle(function () { 
    searchPosts() 
  }, 500, { trailing: false });

  const searchPosts = () => {
    router.get(route('posts'), { search: search.value }, {
        preserveState: true,
        replace: true
    });
  }

</script>