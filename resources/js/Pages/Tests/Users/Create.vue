<template>
    <Layout>
        <div>
        <form @submit.prevent="submit">
            <label for="name">Name:</label>
            <input id="name" v-model="form.name" class="border"/>
            <div v-if="errors.name">{{ errors.name }}</div>
            <label for="email">Email</label>
            <input id="email" v-model="form.email" class="border"/>
            <div v-if="errors.email">{{ errors.email }}</div>
            <label for="password">Password:</label>
            <input id="password" v-model="form.password" class="border"/>
            <div v-if="errors.password">{{ errors.password }}</div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
        </div>
    </Layout>
</template>


<script>

import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Layout from "@/Components/Layout";
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { useRemember } from '@inertiajs/inertia-vue3'
export default {
    // setup() {
    //     const form = useRemember({
    //         name: null,
    //         email: null,
    //     }, 'test/new-user')
    //
    //
    //     return { form }
    // },

    props: {
        errors: Object,
    },
    components: {
        Head,
        Layout,
    },
    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/test/new-user', this.form)
        },
    },
}
</script>
