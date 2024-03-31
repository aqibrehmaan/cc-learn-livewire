<div
    x-data="{ body: null }"
    x-show="body"
    x-on:alert.window="
        body = $event.detail[0].body

        setTimeout(() => {
            body = null
        }, 2000)
    "
    class="bg-blue-500 text-white absolute top-0 right-0 p-3 m-3 rounded-lg"
>
    <span x-text="body"></span>
</div>
