<template>
    <main>
        <header>
            <Link href="/">Home</Link>

        </header>
        <article>
            <slot />
        </article>
    </main>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        Link,
    }
}
</script>
