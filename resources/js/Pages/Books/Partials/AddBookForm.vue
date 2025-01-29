<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';


const user = usePage().props.auth.user;

const form = useForm({
    'title': '',
    'author': '',
    'publishing_date': '',
    'description': '',
    'page_count': 0,
    'image': '',
});

</script>

<template>
    <section>
        <form
            @submit.prevent="form.post(route('books.store'), { onSuccess: () => form.reset() })"
            class="space-y-6"
        >
            <div>
                <InputLabel for="title" value="Title" class="text-xl mb-2"/>
                <input
                    type="text"
                    v-model="form.title"
                    placeholder="Title"
                    class="block w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                <InputError :message="form.errors.title" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="author" value="Author" class="text-xl mb-2"/>
                <input
                    type="text"
                    v-model="form.author"
                    placeholder="Author"
                    class="block w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                <InputError :message="form.errors.author" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="publishing_date" value="Publishing Date" class="text-xl mb-2"/>
                <input
                    type="date"
                    v-model="form.publishing_date"
                    placeholder="Publishing Date"
                    class="block w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                <InputError :message="form.errors.publishing_date" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="description" value="Description" class="text-xl mb-2"/>
                <textarea
                    v-model="form.description"
                    placeholder="Description"
                    class="block w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                ></textarea>
                <InputError :message="form.errors.description" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="page_count" value="Page Count" class="text-xl mb-2"/>
                <input
                    type="number"
                    v-model="form.page_count"
                    placeholder="Page Count"
                    class="block w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                <InputError :message="form.errors.page_count" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="image" value="Image" class="text-xl mb-2"/>
                <input
                    type="file"
                    v-on:change="form.image"
                    placeholder="Cover Image"
                    class="block w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                <InputError :message="form.errors.image" class="mt-2"/>
            </div>

            <div class="max-w-max">
                <PrimaryButton type="submit" class="w-12 mx-auto">
                    Add Book
                </PrimaryButton>
            </div>
        </form>
    </section>

</template>

<style scoped>

</style>
