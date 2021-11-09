<template>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="post" @submit.prevent="submit">
                <h2 class="text-left">Update User</h2>
                <div class="form-group">
                    <label for="name">User name</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="form.name" />
                </div>
                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="text" id="email" name="email" class="form-control" v-model="form.email" />
                </div>
                <button type="submit" class="btn btn-primary btn-block" value="Update">submit</button>
            </form>
        </div>
    </div>
</template>
<script>
import {inject, reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";
export default {
    name: "Edit",
    components: {
    },
    props: {
        errors: Object
    },
    setup() {
        const form = reactive({
            name:null,
            email:null,
            _token: usePage().props.value.csrf_token,
            _method: "PUT"
        });
        // retrieve user prop
        const {name,email, id } = usePage().props.value.user;
        form.name = name;
        form.email = email;
        const route = inject('route');

        function submit() {
            Inertia.post(route('test.user.update', {'id': id}), form, {
                forceFormData: true
            });
        }
        return {
            form, submit,
        }
    }
}
</script>
<style scoped>
form {
    margin-top: 20px;
}
</style>
