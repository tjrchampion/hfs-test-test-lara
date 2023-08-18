<template>
  <div class="max-w-3xl w-full mx-auto py-10 space-y-10">
    <form v-on:submit.prevent="submitForm">
      <label for="postTile">Post title</label>
      <input type="text" id="postTile" v-model="form.title">

      <label for="postBody">Post title</label>
      <textarea id="postBody"  rows="5" class="border w-full p-2" v-model="form.body"></textarea>

      <button type="submit">Create Post</button>
    </form>
  </div>
</template>

<script setup>

  import { useForm } from '@inertiajs/vue3';

  const form  = useForm({
    title: '',
    body: '',
  });

  const submitForm = () => {
    form.post(route('posts.store'));
  }

</script>