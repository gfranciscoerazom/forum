<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { dashboard } from '@/routes';
import Pagination from '@/components/Pagination.vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Dashboard',
                href: dashboard(),
            },
        ],
    },
});

defineProps(['posts']);
</script>

<template>

    <Head title="Dashboard" />
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
        <ul class="divide-y">
            <li v-for="post in posts.data" :key="post.id" class="py-4">
                <span class="font-bold text-lg">
                    {{ post.title }}
                </span>
            </li>
        </ul>

        <Pagination :meta="posts.meta" />
    </div>
</template>