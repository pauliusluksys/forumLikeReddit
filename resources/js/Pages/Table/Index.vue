<template>
    <div id="app">
    <p v-if="visible()">{{ message }}</p>

    </div>
</template>
<script>
import {usePage} from "@inertiajs/inertia-vue3";
import Vue from "laravel-mix";
var app = new Vue({
el: '#app',
data: {
message: 'Hello, it is this easy!'
},
methods: {
visible: function() {
return true;
}
}
});
</script>
