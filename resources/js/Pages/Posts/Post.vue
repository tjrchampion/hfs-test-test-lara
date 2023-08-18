<template>
 <div class="container mx-auto">
    <h1 class="mb-4 mt-10 text-3xl dark:text-black md:text-5xl lg:text-6xl">
      <span class="font-extrabold text-gray-900 text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">HFS</span>Blog: {{ post.title }}
    </h1>

      <div class="border-2 border-gray-300 rounded-md p-3 bg-gray-100">
        <h2 class="text-2xl font-extrabold dark:text-black">{{ post.title }}</h2>
        <p class="mt-4 text-base leading-6 text-black">
          {{ post.body }}<br>
          <small class="text-grey:500"> Posted by <strong>{{ post.post_user }} {{ post.created_at }}</strong></small>
        </p>

        <hr class="mt-5 mb-5 border-b-4 border-indigo-500 " />

        <h5 class="mb-4 text-2xl dark:text-black md:text-2xl lg:text-2xl">Comments ({{ post.comments.length }})</h5>

        <ul>
          <li v-for="(comment, key) in post.comments" :key="key">
            <h6 class="font-black mb-1 text-1xl dark:text-black md:text-1xl lg:text-1xl">{{ comment.user.name }}</h6>
            <p class="pb-4 mb-5 border-b-2 text-base leading-6 text-black" >{{ comment.body }}</p>
          </li>
        </ul>

      </div>

    <form v-on:submit.prevent="submitComment" class="mt-5">
      <div class="border-2 mt-5 border-gray-300 rounded-md p-3 bg-gray-100">
        <h2 class="text-2xl font-extrabold dark:text-black">Add a comment</h2>
        <div class="mb-2 mb-2">
          <InputLabel for="postBody" value="What would you like to say?" />
          <textarea 
            id="commentBody"
            class="border w-full mt-3 rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out" 
            rows="5"
            v-model="form.body"
            placeholder="Leave a kind and considerate comment..."
          ></textarea>
          <div v-if="form.errors.body" class="text-red-500">{{ form.errors.body }}</div>  
        </div>
      </div>
    </form>
    <Link href="/" class="mt-8 border border-transparent rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out">Go back</Link>
  </div>
</template>

<script setup>
  import { useForm, Link, router } from '@inertiajs/vue3';
  import InputLabel from '@/Components/InputLabel.vue';

  defineProps({
    post: Object
  });

  const form  = useForm({
    body: '',
  });


  const submitComment = () => {
    form.post(route('comment.store'), {
      preserveScroll: true,
      onSuccess: () => {
        form.reset();
      }
    });
  }

</script>