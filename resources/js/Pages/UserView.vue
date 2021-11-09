<template>
    <layout title="Users">
        <div class="container mt-4">
            <h2>Laravel Inertia JS Pagination Example</h2>
            <table class="table w-full">
                <thead>
                <tr>
                    <th>User id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>edit/delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in usersList.data" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td class="border px-4 py-2">
                        <button @click="edit(row)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</button>
                        <button @click="deleteRow(row)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>

            <pagination class="mt-6" :links="usersList.links" />
        </div>
    </layout>
</template>

<script>
import Pagination from '@/Components/Pagination'

export default {
    components: {
        Pagination
    },
    props: {
        usersList: Object
    },
}

</script>
