<template>
  <div class="max-w-3xl w-full mx-auto py-10 space-y-10">
    <form v-on:submit.prevent="submitForm">
      <label for="postTile">Post title</label>
      <input type="text" id="postTile" v-model="form.title">
      <div v-if="form.errors.title" class="text-red-500">{{ form.errors.title }}</div>

      <label for="postBody">Post title</label>
      <textarea id="postBody"  rows="5" class="border w-full p-2" v-model="form.body"></textarea>
      <div v-if="form.errors.body" class="text-red-500">{{ form.errors.body }}</div>

      <button type="submit">Create Post</button>

      <div class="bg-white border-b border-gray-100" v-for="post in posts"  :key="post.id">
          <h2 class="text-2xl font-extrabold dark:text-black">{{ post.title }}</h2>
          <p>{{ post.body }}</p>
          <small class="text-grey:500"> Posted by <strong>{{ post.post_user }} {{ post.created_at }}</strong></small>
        </div>

    </form>
  </div>
</template>

<script setup>
  import { useForm } from '@inertiajs/vue3';
  import AppLayout from '@/Layouts/AppLayout.vue';


  const form  = useForm({
    title: '',
    body: '',
  });

  defineProps({
    posts: Array
  });

  const submitForm = () => {
    form.post(route('posts.store'), {
      preserveScroll: true,
      onSuccess: () => {
        form.reset();
      }
    });
  }

</script>