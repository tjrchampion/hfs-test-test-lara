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
          <li v-for="(comment, key) in post.comments" :key="key" class="pt-4 pb-4 border-b-2">
            <h6 class="font-black mb-1 text-1xl dark:text-black md:text-1xl lg:text-1xl">{{ comment.user.name }}</h6>
            <p class="mb-5 text-base leading-6 text-black" >{{ comment.body }}</p>

            <div v-if="$page.props.auth.user" class="p-0 m-0">
              <Link class="border border-transparent rounded-md shadow px-1 py-1 inline-flex items-center text-base leading-3 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out" v-if="$page.props.auth.user.id === comment.user_id">Edit</Link>
            </div>

          </li>
        </ul>

        <p v-if="post.comments.length < 1">
          Why not be the first to leave a comment!?
          <Link v-if="!$page.props.auth.user" href="/login" class="text-cyan-400">Please login to leave a comment.</Link>
        </p>

      </div>

      <CommentForm :postId="post.id" v-if="$page.props.auth.user" />

    <Link href="/" class="mt-8 border border-transparent rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out">Go back</Link>
  </div>
</template>

<script setup>
  import { Link } from '@inertiajs/vue3';
  import CommentForm from '@/Components/CommentForm.vue';

  defineProps({
    post: Object
  });

</script>