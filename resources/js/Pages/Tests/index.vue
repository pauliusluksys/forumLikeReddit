<template>

        <Head title="Test"/>
    <div>
        <div v-if="$page.props.flash.message" class="alert">
            {{ $page.props.flash.message }}
        </div>


    </div>
        <p>Hello, {{ user1.name }} welcome to your first Inertia app!s</p>
        <Link class="
                                    px-6
                                    py-2
                                    mb-2
                                    text-green-100
                                    bg-green-500
                                    rounded
                                "
            :href="route('new-user')">
            Create new user
        </Link>

        <table class="table border w-full">
            <thead>
            <tr>
                <th class="border p-3">ID</th>
                <th class="border p-3">Name</th>
                <th class="border p-3">Email</th>
                <th class="border p-3">Created At</th>
                <th class="border p-3">Options</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users2.data" :key="user.id">
                <td class="border p-3">{{ user.id }}</td>
                <td class="border p-3">{{ user.name }}</td>
                <td class="border p-3">{{ user.email }}</td>
                <td class="border p-3">{{ user.created_at}}</td>
                <td class="border p-3">
                    <button @click="edit(user)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                    <button @click="deleteRow(user)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <pagination :links="users2.links" />

        <Link href="/">Home</Link>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title" v-model="form.name">
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" v-model="form.email" placeholder="Enter Body"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                              <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="!editMode" @click="save(form)">
                                Save
                              </button>
                            </span>
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                              <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="editMode" @click="update(form)">
                                Update
                              </button>
                            </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                              <button @click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                              </button>
                            </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <Table
        :filters="queryBuilderProps.filters"
        :on-update="setQueryBuilder"
        :meta="users3"
    >
        <template #head>
            <tr>
                <th @click.prevent="sortBy('id')">Id</th>
                <th @click.prevent="sortBy('name')">name</th>
                <th @click.prevent="sortBy('email')"> Email</th>
            </tr>
        </template>

        <template #body>
            <tr v-for="user in users3.data" :key="user.id">
                <td>{{ user.id}}</td>
                <td >{{ user.name }}</td>
                <td >{{ user.email }}</td>
            </tr>
        </template>
    </Table>
</template>

<script>
import Layout from '@/Components/Layout'
import {Head} from '@inertiajs/inertia-vue3'
import {Link} from '@inertiajs/inertia-vue3'
import Pagination from '@/Components/Pagination'
import FlashMessages from '@/Components/FlashMessages'
import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";
import { InteractsWithQueryBuilder, Tailwind2 } from '@protonemedia/inertiajs-tables-laravel-query-builder';
export default {
    mixins: [InteractsWithQueryBuilder],
    components: {
        Table: Tailwind2.Table,
        Head,
        Layout,
        Link,
        Pagination,
        FlashMessages,
    },
    props: {
        user1: Object,
        users2: Object,
        users3: Object | Array,
    },
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                name: null,
                email: null,
            },
        }
    },
    methods: {
        openModal: function () {
            this.isOpen = true;
        },
        closeModal: function () {
            this.isOpen = false;
            this.reset();
            this.editMode=false;
        },
        reset: function () {
            this.form = {
                name: null,
                email: null,
            }
        },
        save: function (users2) {
            this.$inertia.post('$route(test)', users2)
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit: function (users2) {
            this.form = Object.assign({}, users2);
            this.editMode = true;
            this.openModal();
        },
        update: function (users2) {
            users2._method = 'PATCH';
            this.$inertia.post('/test/update' + users2.id + '/update', users2)
            this.reset();
            this.closeModal();
        },
        deleteRow: function (users2) {
            if (!confirm('Are you sure want to remove?')) return;
            users2._method = 'DELETE';
            this.$inertia.post('/test/' + users2.id, users2)
            this.reset();
            this.closeModal();
        }
    }


}
</script>
