{literal}
<section id="app">
    <ul class="list-group mt-5">
        <li v-for="comment in comments" class="list-group-item d-flex justify-content-between">

            {{ comment.texto }} - {{ comment.calificacion }}

        </li>
    </ul>
</section>
{/literal}